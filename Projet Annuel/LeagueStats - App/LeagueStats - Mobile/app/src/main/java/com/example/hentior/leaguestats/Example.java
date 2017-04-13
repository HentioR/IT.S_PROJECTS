package com.example.hentior.leaguestats;
import java.util.List;
import java.util.Map;

import constant.Region;
import dto.League.League;
import dto.League.LeagueEntry;
import dto.Match.MatchDetail;
import dto.Match.Team;
import dto.MatchHistory.MatchSummary;
import dto.MatchHistory.Participant;
import dto.MatchHistory.ParticipantStats;
import dto.MatchHistory.PlayerHistory;
import dto.Summoner.Summoner;
import main.java.riotapi.RiotApi;
import main.java.riotapi.RiotApiException;
/**
 * Created by HentioR on 26/03/2017.
 */

public class Example {

    public static void main(String[] args) throws RiotApiException {

        // Create Riot API object with API key
        RiotApi api = new RiotApi("API-KEY-HERE");

        // Set Region
        api.setRegion(Region.NA);

        // Get Summoner
        Summoner summoner = api.getSummonerByName("Doublelift");

        /*
         * Get League Entry of summoners using their summoner ID
         * getLeagueEntryBySummoners returns data only for the summoners specified
         * getLeagueBySummoners returns data for EVERYONE in the same league as the summoners specified; we don't need that.
         */
        Map<String, List<League>> leagueEntries = api.getLeagueEntryBySummoners(summoner.getId());

        //Iterate through map entries to get tier and division
        for(Map.Entry<String, List<League>>  entry : leagueEntries.entrySet()) {
            for(League league : entry.getValue()) {
                for(LeagueEntry leagueEntry : league.getEntries()) {
                    System.out.println("Name: " + leagueEntry.getPlayerOrTeamName());
                    System.out.println("Queue: " + league.getQueue());
                    System.out.println("Tier: " + league.getTier());
                    System.out.println("Division: " + leagueEntry.getDivision());
                    System.out.println("Wins: " + leagueEntry.getWins());
                    System.out.println("Losses: " + leagueEntry.getLosses());
                    System.out.println("League Points: " + leagueEntry.getLeaguePoints());
                    System.out.println("----------------------");
                }
            }
        }

    }

	/*
	 * All methods and their return types strictly follow the official Riot Games API documentation.
	 * The official Riot Games API documentation can be found @ - https://developer.riotgames.com/api/methods
	 *
	 * For more information, documentation, and examples visit the riot-api-java library website @ - https://riot-api-java.com/
	 */

}
