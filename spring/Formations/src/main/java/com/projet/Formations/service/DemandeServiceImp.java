package com.projet.Formations.service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.stereotype.Service;
import org.springframework.data.domain.PageRequest;

import com.projet.Formations.dao.DemandeRepository;
import com.projet.Formations.entities.Demande;

@Service
public class DemandeServiceImp implements DemandeService{

	@Autowired
	 DemandeRepository demandeRepository;
	
	@Override
	public Demande saveDemande(Demande d) {
		// TODO Auto-generated method stub
		return demandeRepository.save(d);
	}

	@Override
	public List<Demande> getAllDemandes() {
		// TODO Auto-generated method stub
		return demandeRepository.findAll();
	}

	@Override
	public void deleteDemandeparid(Long id) {
		// TODO Auto-generated method stub
		this.demandeRepository.deleteById(id);
	}

	@Override
	public Page<Demande> getAllDemandesparpage(int page, int size) {
		// TODO Auto-generated method stub
		return this.demandeRepository.findAll(PageRequest.of(page, size));
	}

	@Override
	public void setFormationId(Long id) {
		// TODO Auto-generated method stub
	
		
	}

	

}
