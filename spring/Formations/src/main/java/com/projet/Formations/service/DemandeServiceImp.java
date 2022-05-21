package com.projet.Formations.service;

import org.springframework.beans.factory.annotation.Autowired;

import com.projet.Formations.dao.DemandeRepository;
import com.projet.Formations.entities.Demande;

public class DemandeServiceImp implements DemandeService{

	@Autowired
	 DemandeRepository demandeRepository;
	
	@Override
	public Demande saveDemande(Demande d) {
		// TODO Auto-generated method stub
		return demandeRepository.save(d);
	}

}
