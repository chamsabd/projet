package com.projet.Formations;

import org.junit.jupiter.api.Test;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.context.SpringBootTest;

import com.projet.Formations.dao.ClientRepository;
import com.projet.Formations.entities.Client;


@SpringBootTest

public class ClientsApplicationTests {
	
		@Autowired
		private ClientRepository clientRepository;

		@Test
		void contextLoads() {
		}
		@Test
		public void testCreateClient() {
		Client etd = new Client(10.4 , 'DSI', 12345678 , 3.6);
		//produitRepository.save(prod); Client(Long idClient, String specialite, int ncin, Double idDepartement) 
		clientRepository.save(etd);
		}
		
		
		
}
