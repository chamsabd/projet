package com.projet.Formations.dao;
import org.springframework.data.jpa.repository.JpaRepository;
import com.projet.Formations.entities.Demande;

public interface DemandeRepository  extends JpaRepository<Demande, Long> {
	
}

