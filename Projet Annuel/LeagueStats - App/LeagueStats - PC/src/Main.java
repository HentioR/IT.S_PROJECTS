

import javafx.application.Application;
import javafx.scene.ImageCursor;
import javafx.scene.Scene;
import javafx.scene.image.Image;
import javafx.stage.Stage;


public class Main extends Application {

    @Override
    public void start(Stage primaryStage) {

        Scene scene = new Scene(new MainContent(), 1024, 768);
        primaryStage.getIcons().add(new Image("http://vignette1.wikia.nocookie.net/leagueoflegends/images/1/12/League_of_Legends_Icon.png/revision/latest?cb=20150402234343"));

        Image cursor = new Image("ressources/images/cursor.png");
        scene.setCursor(new ImageCursor(cursor));

        primaryStage.setTitle("LeagueStats");
        scene.getStylesheets().add("ressources/style/style.css");
        primaryStage.setScene(scene);
        primaryStage.show();
    }
    public static void main(String[] args) throws Exception {
        launch(args);

    }
}