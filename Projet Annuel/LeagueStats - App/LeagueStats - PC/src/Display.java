package leagueStats;

import java.util.Scanner;
import Champion.Champion;
import Requete.Requete;
/**
 * Created by HentioR on 08/02/2017.
 */
public class Display {
    public Display() throws Exception {
        Champion c = new Champion();
        int choix;

        Requete r = new Requete();


        do {
            System.out.println("\n\n---MENU---");
            System.out.println("1. Quitter");
            System.out.println("2. Champion");

            choix = new Scanner(System.in).nextInt();

            switch (choix) {
                case 1:
                    System.out.println(c);
                    break;
                case 2:
                    r.reload();
                    System.out.println("\n");
                    System.out.println(r);


            }
        } while (choix != 0);
        r.fermerConnexion();
    }
}
