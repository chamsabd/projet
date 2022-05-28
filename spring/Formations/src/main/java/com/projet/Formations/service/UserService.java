package com.projet.Formations.service;

import java.util.List;
import java.util.Objects;



import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.security.core.userdetails.UserDetailsService;
import org.springframework.security.core.userdetails.UsernameNotFoundException;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.stereotype.Service;

import com.projet.Formations.dao.UserRepository;
import com.projet.Formations.entities.User;

import groovy.util.logging.Slf4j;

@Service
@Slf4j
public class UserService implements  UserDetailsService{
	private final UserRepository userRepository; 
	@Autowired
	public UserService(UserRepository userRepository) { 
	 this.userRepository = userRepository; 
	 } 
	 static boolean isValid(String email) {
		String regex = "^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$";
		return email.matches(regex);
	 }
	
	public User saveUser(String username,int nCin, String nom,String prenom, String password, String confirmedPassword,String profile) { 
		 User appUser = new User(); 
		
		 if (Integer.toString(nCin).length()!=8) 
		 throw new RuntimeException("n cin doit etre de length 8"); 
		 if (!isValid(username)) 
		 throw new RuntimeException("email not valid"); 
		 if (nom.equals("")) 
		 throw new RuntimeException("nom is required"); 
		 if (prenom.equals("")) 
		 throw new RuntimeException("prenom is required"); 
		 if (userRepository.findUserWithName(username).isPresent() == true) 
		 throw new RuntimeException("User already exists");
		 if (userRepository.findUserWithNCin(nCin).isPresent() == true) 
		 throw new RuntimeException("User already exists");  
		 if (password.equals("")) 
		 throw new RuntimeException("Please add your password");
		 if (!password.equals(confirmedPassword)) 
		 throw new RuntimeException("Please confirm your password"); 
		 appUser.setUsername(username); 
		 if (userRepository.findByIdUser(1L).isPresent()==false) {
			appUser.setRole("ADMIN");
		 }
		 else
		appUser.setRole("USER");
		appUser.setProfile(profile);
		 appUser.setPassword(new BCryptPasswordEncoder().encode(password));
		 appUser.setNom(nom); 
		 appUser.setPrenom(prenom);
		 appUser.setnCin(nCin);
		 userRepository.save(appUser); 
		 return appUser; 
		 }
	@Override
	public UserDetails loadUserByUsername(String username) throws UsernameNotFoundException {
		Objects.requireNonNull(username); 
		 User user = userRepository.findUserWithName(username).orElseThrow(() -> new UsernameNotFoundException("User not found")); 
		 return user;
	}
	public User UserSave(User user) {
		return userRepository.save(user);
	}

	public List<User> getAllResponsables() { 
	 return userRepository.findAll(); 
	 }
	
	 public User getresponsable(Long id) {
		 return this.userRepository.getById(id);
	 }
 
}
