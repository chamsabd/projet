package com.projet.Formations.service;



import java.util.List;


import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;


import com.projet.Formations.entities.Formation;
import com.projet.Formations.entities.User;

public interface FormationService {
	List<Formation> getAllFormations(String etat);
	Formation saveFormation(Formation f);
	Formation updateFormation(Formation f);
	void deleteFormationparid(Long id);
	Formation getFormation(Long id);
	Page<Formation> getAllFormationsparpage(User user,String profile,int page,int size);
	 Page<Formation> findByTitreFormationContains(String titreFormation,Pageable pageable);

}
