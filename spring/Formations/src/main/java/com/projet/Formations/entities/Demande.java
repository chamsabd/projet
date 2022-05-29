package com.projet.Formations.entities;

import java.util.Date;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;

import org.springframework.beans.factory.annotation.Autowired;
@Entity
public class Demande {

	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY) // auto increment
	private Long idDemande;
	@ManyToOne
	@JoinColumn(name = "idUser")
	private User user;
	@ManyToOne
	@JoinColumn(name = "idFormation")
	@Autowired
	private Formation formation;
	private Date dateDemande;
	private Boolean accepted;
	public Demande( Date dateDemande,Formation formation,User user ) {
		super();
		this.formation=formation;
		this.user=user;
		this.dateDemande = dateDemande;
		this.accepted=false;
	}
	

	public Boolean getAccepted() {
		return accepted;
	}


	public void setAccepted(Boolean accepted) {
		this.accepted = accepted;
	}


	public Demande() {
		super();
	
		
	}
	public Long getFormationId() {
		return formation.getIdFormation();
	}


	public Demande(Date dateDemande2, int i, int j) {
		
	}
	public Long getIdDemande() {
		return idDemande;
	}

	public void setIdDemande(Long idDemande) {
		this.idDemande = idDemande;
	}



	public Formation getFormation() {
		return formation;
	}
	public User getUser() {
		return user;
	}
	public void setFormation(Formation formation) {
		this.formation = formation;
	}
	public void setUser(User user) {
		this.user = user;
	}
	public Date getDateDemande() {
		return dateDemande;
	}

	public void setDateDemande(Date dateDemande) {
		this.dateDemande = dateDemande;
	}

}
