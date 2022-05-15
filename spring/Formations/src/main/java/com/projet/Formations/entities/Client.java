package com.projet.Formations.entities;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;

@Entity

public class Client {
	@Id
	@GeneratedValue (strategy = GenerationType.IDENTITY)
	private Long idClient;
	private String specialite;
	private int ncin;
	private Double idDepartement;
	public Long getIdClient() {
		return idClient;
	}
	public void setIdClient(Long idClient) {
		this.idClient = idClient;
	}
	public String getSpecialite() {
		return specialite;
	}
	public void setSpecialite(String specialite) {
		this.specialite = specialite;
	}
	public int getNcin() {
		return ncin;
	}
	public void setNcin(int ncin) {
		this.ncin = ncin;
	}
	public Double getIdDepartement() {
		return idDepartement;
	}
	public void setIdDepartement(Double idDepartement) {
		this.idDepartement = idDepartement;
	}
	public Client(Long idClient, String specialite, int ncin, Double idDepartement) {
		super();
		this.idClient = idClient;
		this.specialite = specialite;
		this.ncin = ncin;
		this.idDepartement = idDepartement;
	}
	public Client() {
		super();
		// TODO Auto-generated constructor stub
	}
	@Override
	public String toString() {
		return "Client [idClient=" + idClient + ", specialite=" + specialite + ", ncin=" + ncin + ", idDepartement="
				+ idDepartement + "]";
	}
	
	
}
