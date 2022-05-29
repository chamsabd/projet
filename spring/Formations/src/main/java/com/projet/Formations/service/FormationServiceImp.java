package com.projet.Formations.service;




import java.security.Principal;

import java.util.List;


import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.PageRequest;
import org.springframework.data.domain.Pageable;
import org.springframework.security.authentication.UsernamePasswordAuthenticationToken;
import org.springframework.security.core.Authentication;
import org.springframework.security.core.annotation.AuthenticationPrincipal;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.stereotype.Service;

import ch.qos.logback.core.joran.conditional.ElseAction;

import com.projet.Formations.dao.FormationRepository;
import com.projet.Formations.dao.UserRepository;
import com.projet.Formations.entities.Formation;
import com.projet.Formations.entities.User;


@Service
public class FormationServiceImp implements FormationService {
	@Autowired
		UserService userservice;
		@Autowired
		UserRepository userrepository;
		
		
	
	@Autowired
private	 FormationRepository formationRepository; 
	@Override
	public Formation saveFormation(Formation f) {
		// TODO Auto-generated method stub
		return this.formationRepository.save(f);
	}

	@Override
	public Formation updateFormation(Formation f) {

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
	public Page<Formation> getAllFormationsparpage(User user,String profile,int page, int size) {
	if (profile.equals("responsable")) {
				return this.formationRepository.findByResponsable(user, PageRequest.of(page, size));
			//return  formationRepository.findAll( PageRequest.of(page, size)); 
	} else if(profile.equals("formateur")){
		return  formationRepository.findByFormateur(user, PageRequest.of(page, size));
		
			}
			else  //participant 
			return formationRepository.findAll(PageRequest.of(page, size));

			}
	@Override

	public List<Formation> getAllFormations(String profile) { 
	 
	 return formationRepository.findAll(); 
	 } 
	@Override
	public Page<Formation> findByTitreFormationContains(String nomFormation, Pageable pageable) {
		// TODO Auto-generated method stub
		return this.formationRepository.findByTitreFormationContains(nomFormation, pageable);
	}



}
