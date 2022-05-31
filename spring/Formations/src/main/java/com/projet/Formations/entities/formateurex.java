package com.projet.Formations.entities;

//import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;

@Entity
public class formateurex {
	@Id
	@GeneratedValue (strategy = GenerationType.IDENTITY)
	private Long idFormateurex;
	//@Column(unique=true)
	private int ncin;
	//@Column(unique=true)
	private String email;
	private String nom;
	private String prenom;
	private String specialite;
	public formateurex(int ncin, String email, String nom, String prenom, String specialite) {
		super();
		this.ncin = ncin;
		this.email = email;
		this.nom = nom;
		this.prenom = prenom;
		this.specialite = specialite;
	}
	
	public formateurex() {
		super();
	}

	public int getNcin() {
		return ncin;
	}
	public void setNcin(int ncin) {
		this.ncin = ncin;
	}
	public String getEmail() {
		return email;
	}
	public void setEmail(String email) {
		this.email = email;
	}
	public String getNom() {
		return nom;
	}
	public void setNom(String nom) {
		this.nom = nom;
	}
	public String getPrenom() {
		return prenom;
	}
	public void setPrenom(String prenom) {
		this.prenom = prenom;
	}
	public String getSpecialite() {
		return specialite;
	}
	public void setSpecialite(String specialite) {
		this.specialite = specialite;
	}

	public Long getIdFormateurex() {
		return idFormateurex;
	}

	public void setIdFormateurex(Long idFormateurex) {
		this.idFormateurex = idFormateurex;
	}
	
	
	
	

}
