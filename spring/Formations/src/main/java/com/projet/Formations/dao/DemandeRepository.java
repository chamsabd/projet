package com.projet.Formations.dao;



import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import java.util.Optional;

import com.projet.Formations.entities.Demande;
import com.projet.Formations.entities.Formation;
import com.projet.Formations.entities.User;

public interface DemandeRepository  extends JpaRepository<Demande, Long> {
	@Query(" select d from Demande d where d.user = ?1 and d.formation=?2") 
	 Optional<Demande> findDemande(User user,Formation formation);
	 
Page<Demande> findByFormation(Formation f,Pageable p);
Demande findByIdDemande(Long id);

}






