package com.projet.Formations;

//import java.util.Date;
//
//import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.CommandLineRunner;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;

//import com.projet.Formations.entities.Demande;

@SpringBootApplication
public class FormationsApplication implements CommandLineRunner{
//	@Autowired
//	private DemandeServiceImpl service; 
	public static void main(String[] args) {
		SpringApplication.run(FormationsApplication.class, args);
	}
	@Override
	public void run(String... args) throws Exception { 
	 // TODO Auto-generated method stub
//	 Demande demad1 = new Demande(); 
//	 service.saveProduit(demad1);
	}
}
