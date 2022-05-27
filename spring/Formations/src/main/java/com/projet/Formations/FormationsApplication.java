package com.projet.Formations;

import com.projet.Formations.entities.Demande;
import com.projet.Formations.service.DemandeService;


//
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.CommandLineRunner;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;


@SpringBootApplication
public class FormationsApplication implements CommandLineRunner{
	@Autowired
	private DemandeService service; 
	
	@Autowired
	public static void main(String[] args) {
		SpringApplication.run(FormationsApplication.class, args);
	}
	@Override
	public void run(String... args) throws Exception { 
	
		
		
Demande demad1 = new Demande(); 
service.saveDemande(demad1);
	}
}
