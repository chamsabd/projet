package com.projet.Formations.dao;

import java.util.Optional;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import com.projet.Formations.entities.User;

public interface UserRepository extends JpaRepository<User,Long>{
	@Query(" select u from User u where u.username = ?1") 
	 Optional<User> findUserWithName(String username);
	// @Query(" select u from User u where u.username = ?1") 
	 User findByUsername(String name);
	 @Query(" select u from User u where u.nCin = ?1") 
    Optional<User> findUserWithNCin(int nCin);
}
