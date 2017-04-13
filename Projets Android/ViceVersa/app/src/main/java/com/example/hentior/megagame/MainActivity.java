package com.example.hentior.megagame;


import android.content.DialogInterface;
import android.content.Intent;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.view.inputmethod.InputMethodManager;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.TextView;

public class MainActivity extends AppCompatActivity implements View.OnClickListener {

    private EditText txtNumber;
    private TextView lblResult;
    private ProgressBar pgbScore;
    private TextView lblHistory;
    private TextView counter;
    private int pool;
    private int searchedValue;
    private int score;
    private String msg;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        txtNumber = (EditText) findViewById(R.id.txtNumber);
        lblResult = (TextView) findViewById(R.id.lblResult);
        pgbScore = (ProgressBar) findViewById(R.id.pgbScore);
        lblHistory = (TextView) findViewById(R.id.lblHistory);
        counter = (TextView) findViewById(R.id.counter);

        /* Button */
        Button btnCompare = (Button) findViewById(R.id.btnCompare);
        btnCompare.setOnClickListener(this);


        init();
    }

    private void init(){
        score = 0;
        searchedValue = 1+(int) (Math.random()*100);
        Log.i("DEBUG", "Valeur cherchée :" +searchedValue);
        pool = 10;
        txtNumber.setText("");
        pgbScore.setProgress(score);
        lblResult.setText("");
        lblHistory.setText("");
        msg = getString(R.string.counterDisplay)+ pool;
        counter.setText(msg);
        txtNumber.requestFocus();

    }

    @Override
    public void onClick(View v) {
        switch (v.getId()) {

            case R.id.btnRestart:
                Log.i("DEBUG", "Bouton Restart Cliqué");
                Intent intent = getIntent();
                finish();
                startActivity(intent);
                //setContentView(R.layout.activity_main);

                break;

            case R.id.btnRq:
                Log.i("DEBUG", "Bouton Ragequit Cliqué");
                System.exit(0);
                break;

            case R.id.btnCompare:
                Log.i("DEBUG", "Bouton Cliqué");
                String strNumber = txtNumber.getText().toString();
                pool = pool -1;
                if(strNumber.equals("")) return;

                lblHistory.append(strNumber+"\r\n");
                pgbScore.incrementProgressBy(1);

                msg = getString(R.string.counterDisplay)+ pool;
                counter.setText(msg);

                int enteredValue = Integer.parseInt(strNumber);

                if (enteredValue == searchedValue) {
                    hideSoftKeyboard();
                    setContentView(R.layout.win_screen);
                    Button btnRestart = (Button) findViewById(R.id.btnRestart);
                    btnRestart.setOnClickListener(this);
                    Button btnRq = (Button) findViewById(R.id.btnRq);
                    btnRq.setOnClickListener(this);
                } else if (enteredValue < searchedValue) {
                    lblResult.setText(R.string.strGreater);
                } else{
                    lblResult.setText(R.string.strLower);
                }

                if (pool == 0 && enteredValue != searchedValue){
                    hideSoftKeyboard();
                    setContentView(R.layout.lose_screen);
                    Button btnRestart = (Button) findViewById(R.id.btnRestart);
                    btnRestart.setOnClickListener(this);
                    Button btnRq = (Button) findViewById(R.id.btnRq);
                    btnRq.setOnClickListener(this);
                }

                default:
                    break;

    }
    }

    /*
    private View.OnClickListener btnSubmitListener = new View.OnClickListener() {
        @Override
        public void onClick(View v) {

        }
    };
*/
    /**
     * Hides the soft keyboard
     */
    public void hideSoftKeyboard() {
        if(getCurrentFocus()!=null) {
            InputMethodManager inputMethodManager = (InputMethodManager) getSystemService(INPUT_METHOD_SERVICE);
            inputMethodManager.hideSoftInputFromWindow(getCurrentFocus().getWindowToken(), 0);
        }
    }

    /**
     * Shows the soft keyboard
     */
    /*public void showSoftKeyboard(View view) {
        InputMethodManager inputMethodManager = (InputMethodManager) getSystemService(INPUT_METHOD_SERVICE);
        view.requestFocus();
        inputMethodManager.showSoftInput(view, 0);
    }*/


    /* Victoire */
    private void congratulations(){
        lblResult.setText(R.string.congratulations);
        AlertDialog retryAlert  = new AlertDialog.Builder(this).create();
        retryAlert.setTitle(R.string.app_name);
        retryAlert.setMessage(getString(R.string.strMessage, score));

        retryAlert.setButton(AlertDialog.BUTTON_POSITIVE, getString(R.string.yes), new AlertDialog.OnClickListener(){

            @Override
            public void onClick(DialogInterface dialog, int which) {
                init();
            }
        });

        retryAlert.setButton(AlertDialog.BUTTON_NEGATIVE, getString(R.string.no), new AlertDialog.OnClickListener(){

            @Override
            public void onClick(DialogInterface dialog, int which) {
                init();
            }
        });

        retryAlert.show();

    }

}
