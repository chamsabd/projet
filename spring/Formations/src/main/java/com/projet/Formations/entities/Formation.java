package com.projet.Formations.entities;

//import java.util.Calendar;
import java.util.Collection;
import java.util.Date;
import java.util.List;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToMany;
import javax.persistence.ManyToOne;
import javax.persistence.OneToMany;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;
//import javax.validation.constraints.AssertFalse;
//import javax.validation.constraints.AssertTrue;
import javax.validation.constraints.Future;
import javax.validation.constraints.FutureOrPresent;
import javax.validation.constraints.Max;
import javax.validation.constraints.Min;
//import javax.validation.constraints.NotBlank;
import javax.validation.constraints.NotNull;
import javax.validation.constraints.Null;
import javax.validation.constraints.Size;

//import org.apache.jasper.tagplugins.jstl.core.When;
import org.springframework.format.annotation.DateTimeFormat;
//import org.springframework.lang.NonNull;

@Entity
public class Formation {
	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY) // auto increment
	private Long idFormation;
	
@NotNull @Size(min = 5, max = 30)
	private String titreFormation;
	
	@Size(max = 100)
	private String description;
	
@NotNull @Temporal(TemporalType.DATE)
	@DateTimeFormat(pattern = "yyyy-MM-dd")
	@FutureOrPresent
	private Date dateDebut;
	@NotNull
	@Temporal(TemporalType.DATE)
	@DateTimeFormat(pattern = "yyyy-MM-dd")
	@Future
	private Date dateFin;
	@NotNull
	private boolean etat;
	@NotNull
	@Min(0)
	@Max(30)
	private int nbrPlace;
	@Min(0)
	private float prix;

	@NotNull
    @ManyToOne
	@JoinColumn(name = "idResponsable")
	 private User responsable;

	 @ManyToOne
	 @JoinColumn(name = "idFormateur")
	  private User formateur;

	
	 @OneToMany(mappedBy = "formation")
	 private List<Demande> demandes;
	 
	 


	public Formation() {
		super();

	}

	public Formation(@NotNull @Size(min = 5, max = 30) String titreFormation,
			@Null @Size(min = 15, max = 100) String description, @NotNull Date dateDebut, @NotNull Date dateFin,
			@NotNull boolean etat, @NotNull @Min(10) @Max(30) int nbrPlace, @Min(0) float prix,
			@NotNull User responsable,@NotNull User formateur) {
		this.titreFormation = titreFormation;
		this.description = description;
		this.dateDebut = dateDebut;
		this.dateFin = dateFin;
		this.etat = etat;
		this.nbrPlace = nbrPlace;
		this.prix = prix;
		this.responsable = responsable;
		this.formateur = formateur;
	}

	public User getFormateur() {
		return formateur;
	}


	public void setFormateur(User formateur) {
		this.formateur = formateur;
	}


	public User getResponsable() {
		return responsable;
	}

	public void setResponsable(User responsable) {
		this.responsable = responsable;
	}
	public Long getIdFormation() {
		return idFormation;
	}

	public void setIdFormation(Long idFormation) {
		this.idFormation = idFormation;
	}

	public String getTitreFormation() {
		return titreFormation;
	}

	public void setTitreFormation(String titreFormation) {
		this.titreFormation = titreFormation;
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

	public float getPrix() {
		return prix;
	}

	public void setPrix(float prix) {
		this.prix = prix;
	}

/* 	public List<Demande> getDemandes() {
		return demandes;
	}

	public void setDemandes(List<Demande> demandes) {
		this.demandes = demandes;
	} */

}
