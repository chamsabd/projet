package com.projet.Formations.dao;





import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.data.jpa.repository.JpaRepository;





import com.projet.Formations.entities.Formation;
import com.projet.Formations.entities.User;


public interface FormationRepository extends JpaRepository<Formation, Long> { 

  Page<Formation> findByTitreFormationContains(String titreFormation,Pageable pageable);

  Page<Formation> findByFormateur(User user,Pageable pageable);
  Page<Formation> findByResponsable(User user,Pageable pageable);
  

}
