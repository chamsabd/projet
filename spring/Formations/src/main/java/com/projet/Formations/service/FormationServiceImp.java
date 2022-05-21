package com.projet.Formations.service;



import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.PageRequest;
import org.springframework.data.domain.Pageable;
import org.springframework.stereotype.Service;


import com.projet.Formations.dao.FormationRepository;
import com.projet.Formations.entities.Formation;
@Service
public class FormationServiceImp implements FormationService {
	@Autowired
private	 FormationRepository formationRepository; 
	@Override
	public Formation saveFormation(Formation f) {
		// TODO Auto-generated method stub
		return this.formationRepository.save(f);
	}

	@Override
	public Formation updateFormation(Formation f) {
		// TODO Auto-generated method stub
		return this.formationRepository.save(f);
	}

	@Override
	public void deleteFormationparid(Long id) {
		// TODO Auto-generated method stub
		this.formationRepository.deleteById(id);
		
	}

	@Override
	public Formation getFormation(Long id) {
		// TODO Auto-generated method stub
		return this.formationRepository.getById(id);
	}

	@Override
	public Page<Formation> getAllFormationsparpage(int page, int size) {
		// TODO Auto-generated method stub
		return this.formationRepository.findAll(PageRequest.of(page, size));
	}
	@Override

	public List<Formation> getAllFormations() { 
	 
	 return formationRepository.findAll(); 
	 } 
	@Override
	public Page<Formation> findByTitreFormationContains(String nomFormation, Pageable pageable) {
		// TODO Auto-generated method stub
		return this.formationRepository.findByTitreFormationContains(nomFormation, pageable);
	}





}
