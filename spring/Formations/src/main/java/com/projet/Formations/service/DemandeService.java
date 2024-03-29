package com.projet.Formations.service;

import java.util.List;

import javax.servlet.http.Part;

import com.projet.Formations.entities.Demande;
import com.projet.Formations.entities.Formation;

import org.springframework.boot.autoconfigure.data.web.SpringDataWebProperties.Pageable;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.PageImpl;

public interface DemandeService {
	List<Demande> getAllDemandes();
	Demande saveDemande(Demande d);
	void deleteDemandeparid(Long id);
	Page<Demande> getAllDemandesparpage(Formation f,int page,int size);
	void setFormationId(Long id);
}
