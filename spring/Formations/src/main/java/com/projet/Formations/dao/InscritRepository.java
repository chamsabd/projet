package com.projet.Formations.dao;

import com.projet.Formations.entities.Formation;
import com.projet.Formations.entities.Inscrit;

import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.data.jpa.repository.JpaRepository;

public interface InscritRepository extends JpaRepository<Inscrit,Long>{

    Page<Inscrit> findByFormation(Formation f,Pageable p);
}
