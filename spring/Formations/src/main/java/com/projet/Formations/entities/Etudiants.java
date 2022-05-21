package com.projet.Formations.entities;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.OneToOne;
@Entity
public class Etudiants {
	@Id
	@GeneratedValue (strategy = GenerationType.IDENTITY)
	private Long idEtdudiant;
	private String carteEtud;
	@OneToOne
    @JoinColumn(name = "idClient")
   private Client idClient;
	private Double idResponsable;
	public Long getIdEtdudiant() {
		return idEtdudiant;
	}
	public void setIdEtdudiant(Long idEtdudiant) {
		this.idEtdudiant = idEtdudiant;
	}
	public String getCarteEtud() {
		return carteEtud;
	}
	public void setCarteEtud(String carteEtud) {
		this.carteEtud = carteEtud;
	}
	public Client getIdClient() {
		return idClient;
	}
	public void setIdClient(Client idClient) {
		this.idClient = idClient;
	}
	public Double getIdResponsable() {
		return idResponsable;
	}
	public void setIdResponsable(Double idResponsable) {
		this.idResponsable = idResponsable;
	}
	public Etudiants(Long idEtdudiant, String carteEtud, Client idClient, Double idResponsable) {
		super();
		this.idEtdudiant = idEtdudiant;
		this.carteEtud = carteEtud;
		this.idClient = idClient;
		this.idResponsable = idResponsable;
	}
	public Etudiants() {
		super();
		// TODO Auto-generated constructor stub
	}
	@Override
	public String toString() {
		return "Etudiants [idEtdudiant=" + idEtdudiant + ", carteEtud=" + carteEtud + ", idClient=" + idClient
				+ ", idResponsable=" + idResponsable + "]";
	}

	
}
