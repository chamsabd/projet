package com.projet.Formations.service;

import com.projet.Formations.dao.InscritRepository;
import com.projet.Formations.entities.Formation;
import com.projet.Formations.entities.Inscrit;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.PageRequest;
import org.springframework.stereotype.Service;
@Service
public class InscritServiceImp implements InscritService{
    @Autowired
    InscritRepository inscritRepository;
    @Override
    public Inscrit saveInscrit(Inscrit i) {
    
        return inscritRepository.save(i);
    }

    @Override
    public void deleteInscrit(Long id) {
        inscritRepository.deleteById(id);
        
    }

    @Override
    public Page<Inscrit> getAllInscritsparpage(Formation f, int page, int size) {
       
        return inscritRepository.findByFormation(f,PageRequest.of(page, size));
    }
    
}
