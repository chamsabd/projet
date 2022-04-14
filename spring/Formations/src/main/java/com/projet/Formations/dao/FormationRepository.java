package com.projet.Formations.dao;

import java.util.Date;

import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.data.jpa.repository.JpaRepository;

import org.springframework.data.jpa.repository.Query;


import com.projet.Formations.entities.Formation;


public interface FormationRepository extends JpaRepository<Formation, Long> { 
	 Page<Formation> findByNomFormationContains(String nom,Pageable pageable);

	// @Query("select f from Formation f where f.DateDebut = ?1 ") 
	// Page<Formation> findByDateDebutFormationContains(Date datedebut,Pageable pageable);
//	 Page<Formation> findByDateCertifFormationContains(Date datecertif,Pageable pageable);


}
