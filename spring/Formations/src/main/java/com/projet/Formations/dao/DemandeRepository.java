package com.projet.Formations.dao;


import org.springframework.data.jpa.repository.JpaRepository;

import com.projet.Formations.entities.Demande;



public interface DemandeRepository extends JpaRepository<Demande, Long> { 
		// Page<Demande> findByNomFormationContains(String nom,Pageable pageable);

		// @Query("select f from Formation f where f.DateDebut = ?1 ") 
		// Page<Formation> findByDateDebutFormationContains(Date datedebut,Pageable pageable);
//		 Page<Formation> findByDateCertifFormationContains(Date datecertif,Pageable pageable);


	}

