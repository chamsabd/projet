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
	private Long idUtilisateur;
	@ManyToOne
	@JoinColumn(name = "idFormation")
	private Formation formation;

	private Date dateDemande;

//	public Demande(Long idDemande, Long idUtilisateur, Date dateDemande) {
//		super();
//		this.idDemande = idDemande;
//		this.idUtilisateur = idUtilisateur;
//		this.dateDemande = dateDemande;
//	}

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

	public Long getIdUtilisateur() {
		return idUtilisateur;
	}

	public void setIdUtilisateur(Long idUtilisateur) {
		this.idUtilisateur = idUtilisateur;
	}

	public Formation getFormation() {
		return formation;
	}

	public void setFormation(Formation formation) {
		this.formation = formation;
	}

	public Date getDateDemande() {
		return dateDemande;
	}

	public void setDateDemande(Date dateDemande) {
		this.dateDemande = dateDemande;
	}

	@Override
	public String toString() {
		return "Demande [idDemande=" + idDemande + ", idUtilisateur=" + idUtilisateur + ", formation=" + formation
				+ ", dateDemande=" + dateDemande + ", toString()=" + super.toString() + "]";
	}

//	public Long getIdDemande() {
//		return idDemande;
//	}
//
//	public void setIdDemande(Long idDemande) {
//		this.idDemande = idDemande;
//	}
//
//	public Long getIdUtilisateur() {
//		return idUtilisateur;
//	}
//
//	public void setIdUtilisateur(Long idUtilisateur) {
//		this.idUtilisateur = idUtilisateur;
//	}
//
//
//	public Formation getFormation() {
//		return formation;
//	}
//
//	public void setFormation(Formation formation) {
//		this.formation = formation;
//	}
//
//	public Date getDateDemande() {
//		return dateDemande;
//	}
//
//	public void setDateDemande(Date dateDemande) {
//		this.dateDemande = dateDemande;
//	}
//	@Override
//	public String toString() {
//		return "Demande [idDemande=" + idDemande + ", idUtilisateur=" + idUtilisateur + ", formation=" + formation + ", dateDemande=" + dateDemande + ", toString()=" + super.toString()+ "]";
//	}
}
