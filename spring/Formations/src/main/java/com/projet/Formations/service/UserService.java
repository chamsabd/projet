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
	
	public User saveUser(String username, String password, String confirmedPassword) { 
		 User appUser = new User(); 
		 if (userRepository.findUserWithName(username).isPresent() == true) 
		 throw new RuntimeException("User already exists"); 
		 if (!password.equals(confirmedPassword)) 
		 throw new RuntimeException("Please confirm your password"); 
		 appUser.setUsername(username); 

		//		 Set<Role> roles = new HashSet<Role>(); 
//		 Role r = new Role("ROLE_USER"); 
//		 roleRepository.save(r); 
//		 roles.add(r); 
//		 appUser.setRoles(roles); 
		 appUser.setPassword(new BCryptPasswordEncoder().encode(password)); 
		 userRepository.save(appUser); 
		 return appUser; 
		 }
	@Override
	public UserDetails loadUserByUsername(String username) throws UsernameNotFoundException {
		Objects.requireNonNull(username); 
		 User user = userRepository.findUserWithName(username).orElseThrow(() -> new UsernameNotFoundException("User not found")); 
		 return user;
	}
	


	public List<User> getAllResponsables() { 
	 return userRepository.findAll(); 
	 }
	
	 public User getresponsable(Long id) {
		 return this.userRepository.getById(id);
	 }
 
}
