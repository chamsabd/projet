package com.projet.Formations.dao;



import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.data.jpa.repository.JpaRepository;

import com.projet.Formations.entities.Formation;


public interface FormationRepository extends JpaRepository<Formation, Long> { 

//      Page<Formation> findByNomFormationContains(String nomFormation,Pageable pageable);

     

}
