package com.projet.Formations.entities;

import java.util.Date;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;

@Entity
public class Formation {
	@Id
	@GeneratedValue (strategy = GenerationType.IDENTITY) //auto increment 
	private Long idFormation; 
	private String nomFormation;
	private String description;
	private Date dateDebut;
	private Date dateFin;
	private Date dateCertif;
	private boolean etat;
	private int nbrPlace;
	
	public Formation() {
		super();
		// TODO Auto-generated constructor stub
	}
	public Formation(Long idFormation, String nomFormation, String description, Date dateDebut, Date dateFin,
			Date dateCertif, boolean etat, int nbrPlace) {
		super();
		this.idFormation = idFormation;
		this.nomFormation = nomFormation;
		this.description = description;
		this.dateDebut = dateDebut;
		this.dateFin = dateFin;
		this.dateCertif = dateCertif;
		this.etat = etat;
		this.nbrPlace = nbrPlace;
	}
	public Long getIdFormation() {
		return idFormation;
	}
	public void setIdFormation(Long idFormation) {
		this.idFormation = idFormation;
	}
	public String getNomFormation() {
		return nomFormation;
	}
	public void setNomFormation(String nomFormation) {
		this.nomFormation = nomFormation;
	}
	public String getDescription() {
		return description;
	}
	public void setDescription(String description) {
		this.description = description;
	}
	public Date getDateDebut() {
		return dateDebut;
	}
	public void setDateDebut(Date dateDebut) {
		this.dateDebut = dateDebut;
	}
	public Date getDateFin() {
		return dateFin;
	}
	public void setDateFin(Date dateFin) {
		this.dateFin = dateFin;
	}
	public Date getDateCertif() {
		return dateCertif;
	}
	public void setDateCertif(Date dateCertif) {
		this.dateCertif = dateCertif;
	}
	public boolean isEtat() {
		return etat;
	}
	public void setEtat(boolean etat) {
		this.etat = etat;
	}
	public int getNbrPlace() {
		return nbrPlace;
	}
	public void setNbrPlace(int nbrPlace) {
		this.nbrPlace = nbrPlace;
	} 
	
}

