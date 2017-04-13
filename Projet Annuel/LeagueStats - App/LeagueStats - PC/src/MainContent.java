
import Champion.Champion;
import Requete.Requete;
import javafx.event.EventHandler;
import javafx.geometry.Insets;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.geometry.Pos;
import javafx.scene.control.Button;
import javafx.scene.layout.BorderPane;
import javafx.scene.layout.HBox;
import javafx.scene.layout.VBox;

import java.sql.SQLException;
import java.util.Scanner;

/**
 * Created by HentioR on 07/02/2017.
 */
public class MainContent extends BorderPane{
    public MainContent() {

        // Bouton champions
        Button btn = new Button("Champions");
        btn.setId("button1");
        btn.setOnAction((javafx.event.ActionEvent e) -> {
        Champion c = new Champion();
        int choix;

            Requete r = null;
            try {
                r = new Requete();
            } catch (Exception e1) {
                e1.printStackTrace();
            }


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
                    try {
                        r.reload();
                    } catch (SQLException e1) {
                        e1.printStackTrace();
                    }
                    System.out.println("\n");
                    System.out.println(r);


            }
        } while (choix != 0);
            try {
                r.fermerConnexion();
            } catch (SQLException e1) {
                e1.printStackTrace();
            }
        });

        // Bouton Quitter
        Button btn2 = new Button("Quitter");
        btn2.setId("button1");
        btn2.setOnAction(event -> System.exit(1));


        Image banniere = new Image("ressources/images/title3.png");
        ImageView title = new ImageView(banniere);

        VBox root = new VBox(20);
        VBox.setMargin(title, new Insets(60,0,70,0));
        root.getChildren().addAll(title,btn,btn2);
        root.setId("pane");

        setCenter(root);
        root.setAlignment(Pos.TOP_CENTER);
    }

}
