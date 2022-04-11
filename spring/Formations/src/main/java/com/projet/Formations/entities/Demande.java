package com.projet.Formations.entities;

import java.util.Date;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;

@Entity
public class Demande {
	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY) // auto increment
	private Long idDemande;
	private Long idResponsable;
	private Long idClient;
	@ManyToOne
	@JoinColumn(name = "idFormation")
	private Formation formation;
	
	private Date dateDemande;

	public Demande(Long idDemande, Long idResponsable, Long idClient, Date dateDemande) {
		super();
		this.idDemande = idDemande;
		this.idResponsable = idResponsable;
		this.idClient = idClient;
		

		this.dateDemande = dateDemande;
	}

	public Demande() {
		super();
		// TODO Auto-generated constructor stub
	}

	public Long getIdDemande() {
		return idDemande;
	}

	public void setIdDemande(Long idDemande) {
		this.idDemande = idDemande;
	}

	public Long getIdResponsable() {
		return idResponsable;
	}

	public void setIdResponsable(Long idResponsable) {
		this.idResponsable = idResponsable;
	}

	public Long getIdClient() {
		return idClient;
	}

	public void setIdClient(Long idClient) {
		this.idClient = idClient;
	}



	public Date getDateDemande() {
		return dateDemande;
	}

	public void setDateDemande(Date dateDemande) {
		this.dateDemande = dateDemande;
	}

}
