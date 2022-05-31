package com.projet.Formations.dao;





import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Modifying;
import org.springframework.data.jpa.repository.Query;
import org.springframework.transaction.annotation.Transactional;

import com.projet.Formations.entities.Formation;
import com.projet.Formations.entities.User;


public interface FormationRepository extends JpaRepository<Formation, Long> { 

  Page<Formation> findByTitreFormationContains(String titreFormation,Pageable pageable);

  Page<Formation> findByFormateur(User user,Pageable pageable);
  Page<Formation> findByResponsable(User user,Pageable pageable);
  @Query(" select f from Formation f where f.idFormation = ?1") 
  Formation findByIdFormation(Long id);
  
  @Transactional
  @Modifying
  @Query("update Formation f set f.nbrPlace = ?1 where f.idFormation = ?2")
  void setNbrPlaceById(int i, Long idFormation);
}
