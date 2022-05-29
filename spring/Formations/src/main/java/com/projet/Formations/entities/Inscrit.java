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

public class Inscrit {


	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY) // auto increment
	private Long idInscrit;
	@ManyToOne
	@JoinColumn(name = "idUser")
	private User user;
	@ManyToOne
	@JoinColumn(name = "idFormation")
	@Autowired
	private Formation formation;
	private Date dateInscrit;

	
	public Inscrit() {
		super();
	}

	public Inscrit(User user, Formation formation, Date dateInscrit) {
		this.user = user;
		this.formation = formation;
		this.dateInscrit = dateInscrit;
	}

	public Long getIdInscrit() {
		return idInscrit;
	}
	public void setIdInscrit(Long idInscrit) {
		this.idInscrit = idInscrit;
	}
	public User getUser() {
		return user;
	}
	public void setUser(User user) {
		this.user = user;
	}
	public Formation getFormation() {
		return formation;
	}
	public void setFormation(Formation formation) {
		this.formation = formation;
	}
	public Date getDateInscrit() {
		return dateInscrit;
	}
	public void setDateInscrit(Date dateInscrit) {
		this.dateInscrit = dateInscrit;
	}
	

	




}
