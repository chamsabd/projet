package com.projet.Formations.service;



import java.util.List;


import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;


import com.projet.Formations.entities.Formation;

public interface FormationService {
	List<Formation> getAllFormations();
	Formation saveFormation(Formation f);
	Formation updateFormation(Formation f);
	void deleteFormationparid(Long id);
	Formation getFormation(Long id);
	Page<Formation> getAllFormationsparpage(int page,int size);
	 Page<Formation> findByTitreFormationContains(String titreFormation,Pageable pageable);

}
