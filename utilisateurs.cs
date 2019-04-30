using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Amajaune
{
    #region Utilisateurs
    public class Utilisateurs
    {
        #region Member Variables
        protected string _Identifiant;
        protected string _Mdp;
        protected string _Nom;
        protected string _Prenom;
        protected string _Mail;
        protected string _Type;
        #endregion
        #region Constructors
        public Utilisateurs() { }
        public Utilisateurs(string Identifiant, string Mdp, string Nom, string Prenom, string Mail, string Type)
        {
            this._Identifiant=Identifiant;
            this._Mdp=Mdp;
            this._Nom=Nom;
            this._Prenom=Prenom;
            this._Mail=Mail;
            this._Type=Type;
        }
        #endregion
        #region Public Properties
        public virtual string Identifiant
        {
            get {return _Identifiant;}
            set {_Identifiant=value;}
        }
        public virtual string Mdp
        {
            get {return _Mdp;}
            set {_Mdp=value;}
        }
        public virtual string Nom
        {
            get {return _Nom;}
            set {_Nom=value;}
        }
        public virtual string Prenom
        {
            get {return _Prenom;}
            set {_Prenom=value;}
        }
        public virtual string Mail
        {
            get {return _Mail;}
            set {_Mail=value;}
        }
        public virtual string Type
        {
            get {return _Type;}
            set {_Type=value;}
        }
        #endregion
    }
    #endregion
}