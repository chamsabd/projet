package com.projet.Formations.security;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServletRequest;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;

import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;


import com.projet.Formations.service.UserService;

import org.springframework.ui.ModelMap;

class UserForm{ 
	 private String username; 
	 private String password; 
	 private String confirmedPassword;
	public String getUsername() {
		return username;
	}
	public void setUsername(String username) {
		this.username = username;
	}
	public String getPassword() {
		return password;
	}
	public void setPassword(String password) {
		this.password = password;
	}
	public String getConfirmedPassword() {
		return confirmedPassword;
	}
	public void setConfirmedPassword(String confirmedPassword) {
		this.confirmedPassword = confirmedPassword;
	} 
	 
	} 
@Controller
public class SecurityController { 
	
	@Autowired
	private UserService userservice;
@GetMapping("/accessDenied") 
public String geterror() { 
 return "accessDenied"; 
 } 
 
@PostMapping("/accessDenied") 
public String posterror() { 
 return "accessDenied"; 
 }
@RequestMapping("/login") 
public String login(ModelMap modelMap ,@RequestParam(name = "etat", defaultValue = "log in") String etat) 
{
	 modelMap.addAttribute("etat",etat); 

		 modelMap.addAttribute("user", new UserForm());
return "login";
}
@RequestMapping("/register") 
public String register(ModelMap modelMap ,@RequestParam(name = "etat", defaultValue = "log in") String etat,UserForm user) throws RuntimeException 
{
	
	try {
	userservice.saveUser(user.getUsername(), user.getPassword(), user.getConfirmedPassword());
	}
	catch(RuntimeException e) {
		 modelMap.addAttribute("erreur",e.getMessage());
		 modelMap.addAttribute("etat","sign up"); 
		 modelMap.addAttribute("user", user);
		 return "login";
	}
	
	 modelMap.addAttribute("etat",etat); 
	
		 modelMap.addAttribute("user", user);

return "login";
}

@GetMapping("/logout") 
public String logout(HttpServletRequest request) throws ServletException 
{ 
request.logout(); 
return "redirect:/login"; 
}

} 

