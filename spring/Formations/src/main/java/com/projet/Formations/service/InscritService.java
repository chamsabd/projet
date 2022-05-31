package com.projet.Formations.service;

import com.projet.Formations.entities.Formation;
import com.projet.Formations.entities.Inscrit;

import org.springframework.data.domain.Page;

public interface InscritService {
    Inscrit saveInscrit(Inscrit i);
	void deleteInscrit(Long id);
	Page<Inscrit> getAllInscritsparpage(Formation f,int page,int size);
}
