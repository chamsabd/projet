package com.projet.Formations;




import java.util.Date;
import java.util.List;

import org.junit.jupiter.api.Test;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.PageRequest;

import com.projet.Formations.dao.FormationRepository;
import com.projet.Formations.entities.Formation;

@SpringBootTest
class FormationsApplicationTests {
	@Autowired
	private FormationRepository formationRepository;

	@Test
	void contextLoads() {
	}

	@Test
	public void testCreateFormation() {
		Formation form = new Formation("formation en sgbd1", "formation from zero to hero pour apprendre oragle",
				new Date(), new Date(), new Date(), true, 20);
		formationRepository.save(form);
	}

	@Test
	public void testFindFormation() {
		Formation f = formationRepository.findById(1L).get();
		System.out.println(f.toString());
	}

	@Test
	public void testUpdateFormation() {
		Formation f = formationRepository.findById(1L).get();
		f.setDescription("update");
		formationRepository.save(f);

		System.out.println(f.toString());
	}

	@Test
	public void testDeleteFormation() {
		formationRepository.deleteById(1L);
	}

	@Test
	public void testFindAllFormations() {
		List<Formation> forms = formationRepository.findAll();

		for (Formation f : forms)
			System.out.println(f);

	}
	@Test
	public void testFindFormationbynom() {
		Page<Formation> forms = formationRepository.findByNomFormationContains("formation en sgbd", PageRequest.of(0, 2).toOptional().get());

		for (Formation f : forms)
			System.out.println(f);

	}
	
}
