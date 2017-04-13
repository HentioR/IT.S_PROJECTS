package Requete;

import java.sql.*;
import java.util.HashMap;
import java.util.Map;

/**
 * Created by Utilisateur on 07/02/2017.
 */
public class Requete {

    private Connection connexion ;
    private HashMap<Integer,String> all = new HashMap<Integer, String>();
    static final String url = "jdbc:mysql://localhost:3306/leagueoflegends";
    static final String utilisateur = "root";
    static final String motDePasse = "root";

    public Requete() throws Exception{

        Class.forName("com.mysql.jdbc.Driver").newInstance();
        connexion = DriverManager.getConnection( url, utilisateur, motDePasse );

    }
    public void reload() throws SQLException{
        Statement statement = connexion.createStatement();
        ResultSet resultat = statement.executeQuery( "SELECT id,nom FROM champion;" );
        all.clear();
        while ( resultat.next() ) {
            all.put(resultat.getInt(1), resultat.getString(2));
        }
    }
    public void StatsRyze() throws SQLException{
        Statement statement = connexion.createStatement();
        ResultSet resultat = statement.executeQuery( "SELECT * FROM champion;" );
        while ( resultat.next() ) {
            int k = 0;
            for (int i = 0; i < resultat.getFetchSize(); i++) {
                all.put(resultat.getInt(1), resultat.getString(i));
                System.out.println(all.get(k));
            }
            k++;
        }
    }
    public String get(int i){
        return all.get(i);
    }

    @Override
    public String toString() {
        String str ="";
        for(Map.Entry<Integer, String> entry : all.entrySet()){
            str += entry.getKey()+": "+entry.getValue()+"\n";
        }
        return str ;
    }



    public void fermerConnexion() throws SQLException{
        connexion.close();
    }


}

