package com.projet.Formations.service;

import java.util.Date;

import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;


import com.projet.Formations.entities.Formation;

public interface FormationService {
	Formation saveFormation(Formation f);
	Formation updateFormation(Formation f);
	void deleteFormationparif(Long id);
	Formation getFormation(Long id);
	Page<Formation> getAllFormationparpage(int page,int size);
	 Page<Formation> findByNomFormationContains(String nom,Pageable pageable);
	 Page<Formation> findByDateDebutFormationContains(Date datedebut,Pageable pageable);
	 Page<Formation> findByDateCertifFormationContains(Date datecertif,Pageable pageable);
}
