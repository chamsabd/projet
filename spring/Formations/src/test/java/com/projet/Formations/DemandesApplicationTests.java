package com.projet.Formations;

import com.projet.Formations.dao.DemandeRepository;
import java.util.Date; 
import java.util.List; 
import org.junit.jupiter.api.Test; 
import org.springframework.beans.factory.annotation.Autowired; 
import org.springframework.boot.test.context.SpringBootTest; 
import com.projet.Formations.dao.DemandeRepository; 
import com.projet.Formations.entities.Demande; 

@SpringBootTest
public class DemandesApplicationTests {
	@Autowired
	private DemandeRepository demandeRepository;


@Test
public void testCreateDemande() { 
 Demande demad = new Demande(); 
demandeRepository.save(demad); 
 } 
	}

