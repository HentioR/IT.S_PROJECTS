package com.example.hentior.leaguestats;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.Button;


public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_menu);

        /* Button */
        Button btnCompare = (Button) findViewById(R.id.buttonChampions);
        btnCompare.setOnClickListener((View.OnClickListener) this);

    }


    public void onClick(View v) {
        switch (v.getId()) {

            case R.id.buttonChampions:
                Log.i("DEBUG", "Bouton Champions Cliqué");
                Intent intent = getIntent();
                finish();
                startActivity(intent);
                //setContentView(R.layout.activity_main);

                break;
        }
    }

}
