package com.projet.Formations.dao;

import org.springframework.data.jpa.repository.JpaRepository;

import com.projet.Formations.entities.Etudiants;

public interface EtudiantRepository extends JpaRepository<Etudiants, Long>{

}
