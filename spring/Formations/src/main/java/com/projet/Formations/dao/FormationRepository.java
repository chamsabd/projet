package com.projet.Formations.dao;

import java.util.Date;

import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import com.projet.Formations.entities.Formation;


public interface FormationRepository extends JpaRepository<Formation, Long> { 
	@Query("select f from Formation f where f.dateDebut = ?1 ") 
	  Page<Formation> findByDateDebutFormationContains(Date dateDebut,Pageable pageable);
      Page<Formation> findByNomFormationContains(String nomFormation,Pageable pageable);

      @Query("select f from Formation f where f.dateCertif =?1 ") 
		 Page<Formation> findByDateCertifFormationContains(Date dateCertif,Pageable pageable);


}
