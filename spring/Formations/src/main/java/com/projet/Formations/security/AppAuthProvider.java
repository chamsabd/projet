package com.projet.Formations.security;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.authentication.BadCredentialsException;
import org.springframework.security.authentication.UsernamePasswordAuthenticationToken;
import org.springframework.security.authentication.dao.DaoAuthenticationProvider;
import org.springframework.security.core.Authentication;
import org.springframework.security.core.AuthenticationException;
import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.security.crypto.password.PasswordEncoder;

import com.projet.Formations.service.UserService;

public class AppAuthProvider extends DaoAuthenticationProvider{
	@Autowired
	 UserService userDetailsService; 
	 @Autowired
	 PasswordEncoder passwordEncoder;
	@Override
	public Authentication authenticate(Authentication authentication) throws
	AuthenticationException { 
	 UsernamePasswordAuthenticationToken auth = (UsernamePasswordAuthenticationToken) 
	authentication; 
	 String name = auth.getName(); 
	 String password = auth.getCredentials().toString(); 
	//  String passwor=passwordEncoder.encode(password);
	 UserDetails user = userDetailsService.loadUserByUsername(name); 
	 System.out.println(password);
	
	
	System.out.println(passwordEncoder.matches(password,user.getPassword()));
	 if (user == null || (!passwordEncoder.matches(password,user.getPassword()))) { 
	 throw new BadCredentialsException("Username/Password does not match for "
	+ auth.getPrincipal()); 
	 } 
	 return new UsernamePasswordAuthenticationToken(user, null, 
	user.getAuthorities()); 
	 } 
	@Override
	public boolean supports(Class<?> authentication) { 
	 return true; 
	 } 

}
