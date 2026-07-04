package com.example.camwelattendance;

import android.annotation.SuppressLint;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.pm.PackageInfo;
import android.content.pm.PackageManager;
import android.net.Uri;
import android.os.Bundle;

import androidx.annotation.NonNull;
import androidx.fragment.app.Fragment;


import android.os.Handler;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import android.widget.LinearLayout;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.RequestQueue;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;
import java.util.Objects;

import okhttp3.Call;
import okhttp3.Callback;
import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.Response;



public class Home extends Fragment implements CamwelGlobal {
    private static final String PREFS_NAME = "app_prefs";
    private static final String KEY_UPDATE_SHOWN = "update_shown";
    String loggedId;
    private OkHttpClient client;
    public Home()
    {
            }
    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        View rootView=inflater.inflate(R.layout.fragment_home, container, false);
        client = new OkHttpClient();
        checkForUpdate();
        LinearLayout markAttendance=rootView.findViewById(R.id.markAttendance);
        LinearLayout empPerformance=rootView.findViewById(R.id.empPerformance);
        LinearLayout leaveApply=rootView.findViewById(R.id.leaveApply);
        LinearLayout moreSection=rootView.findViewById(R.id.moreSection);
        TextView markTime=rootView.findViewById(R.id.markTime);
        TextView thisMonthAtt=rootView.findViewById(R.id.thisMonthAtt);
        LinearLayout holidays=rootView.findViewById(R.id.holidays);
        LinearLayout payslip=rootView.findViewById(R.id.payslip);
        LinearLayout attendanceReport=rootView.findViewById(R.id.attendanceReport);
        SharedPreferences sp = requireActivity().getSharedPreferences("credentials", Context.MODE_PRIVATE);
        markTime.setText(sp.getString("clockInTime", "00:00:00"));
        thisMonthAtt.setText(sp.getString("totalPresent", "0 Day"));

        markAttendance.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view)
            {
                loggedId = sp.getString("uname", "SoftArena");
                isAlreadyMarked(loggedId);
                ((MainActivity) requireActivity()).switchToNewSegment("live_attendance");
            }
        });
        empPerformance.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view)
            {
                ((MainActivity) requireActivity()).switchToNewSegment("performance");
            }
        });
        leaveApply.setOnClickListener(new View.OnClickListener() {
            @SuppressLint("ResourceType")
            @Override
            public void onClick(View view)
            {
                //Log.d("Fetched Data", "Welcome Back:: Profile Data Fetch");
                ((MainActivity) requireActivity()).switchToNewSegment("leave_apply");
            }
        });
        moreSection.setOnClickListener(new View.OnClickListener() {
            @SuppressLint("ResourceType")
            @Override
            public void onClick(View view)
            {
                //Log.d("Fetched Data", "Welcome Back:: Profile Data Fetch");
                ((MainActivity) requireActivity()).switchToNewSegment("moreSection");
            }
        });
        holidays.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view)
            {
                ((MainActivity) requireActivity()).switchToNewSegment("holidays");
            }
        });
        payslip.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view)
            {
                ((MainActivity) requireActivity()).switchToNewSegment("paySlip");
            }
        });
        attendanceReport.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view)
            {
                ((MainActivity) requireActivity()).switchToNewSegment("attendance_report");
            }
        });
        return rootView;
    }

private void isAlreadyMarked(String isMemberId)
{
    Request request = new Request.Builder().url(urlEmpIsAttendance + isMemberId).build();
   // Log.d("Fetched Data", "User Credential this is the function :: "+urlEmpIsAttendance+isMemberId);
    client.newCall(request).enqueue(new Callback() {
        @Override
        public void onFailure(@NonNull Call call, @NonNull IOException e) {
           e.printStackTrace();
           requireActivity().runOnUiThread(() -> Toast.makeText(getContext(), "Failed to fetch data. Please try again later.", Toast.LENGTH_SHORT).show());  }

        @Override
        public void onResponse(@NonNull Call call, @NonNull Response response) throws IOException {
            if (response.isSuccessful()) {
                try {
                    assert response.body() != null;
                    String responseData = response.body().string();
                    JSONObject jsonObject = new JSONObject(responseData);  // This line can throw JSONException
                    String isExist = jsonObject.getString("adClass");
                    Log.d("Attendance Reports", "Data  ::" + jsonObject);
                    if (isExist.equals("success"))
                    {
                       // Log.d("Performance Reports", "No data found. Please try again later.");
                        SharedPreferences sp = requireActivity().getSharedPreferences("credentials", Context.MODE_PRIVATE);
                        SharedPreferences.Editor editor = sp.edit();
                        String curTime=jsonObject.getString("curTime");
                        String location=jsonObject.getString("location");
                        String wrkFrm=jsonObject.getString("wrkFrm");
                        String workDur=jsonObject.getString("workDur");
                        String todayCheckIn=jsonObject.getString("todayCheckIn");
                        String workingDay=jsonObject.getString("workingDay");
                        String clockInTime=jsonObject.getString("clockInTime");
                        String totalPresent=jsonObject.getString("totalPresent");
                        String btnTyp=jsonObject.getString("btnTyp");
                        int workPercent=jsonObject.getInt("workPercent");
                        editor.putString("btnTyp",btnTyp);
                        editor.putString("clockInTime",clockInTime);
                        editor.putString("totalPresent",totalPresent);
                        editor.putString("workingDay",workingDay);
                        editor.putString("curTime",curTime);
                        editor.putString("location",location);
                        editor.putString("wrkFrm",wrkFrm);
                        editor.putString("workDur",workDur);
                        editor.putString("todayCheckIn",todayCheckIn);
                        editor.putInt("workPercent",workPercent);
                        editor.apply();
                    } else {
                        Log.d("Attendance Reports", "No data found. Please try again later.");
                       // requireActivity().runOnUiThread(() ->Toast.makeText(getContext(), "No data found. Please try again later.", Toast.LENGTH_SHORT).show());
                    }
                } catch (JSONException e) {
                    e.printStackTrace(); requireActivity().runOnUiThread(() ->Toast.makeText(getContext(), "Error parsing data. Please try again later.", Toast.LENGTH_SHORT).show());
                    //Log.e("Attendance Reports", "Error parsing JSON data.");
                }
            } else { requireActivity().runOnUiThread(()->Toast.makeText(getContext(), "Failed to fetch data. Please try again later.", Toast.LENGTH_SHORT).show());}
        }
    });

}

    private void checkForUpdate() {
        SharedPreferences sharedPreferences = requireActivity().getSharedPreferences(PREFS_NAME, Context.MODE_PRIVATE);
        boolean updateShown = sharedPreferences.getBoolean(KEY_UPDATE_SHOWN, false);
        OkHttpClient clientFr = new OkHttpClient();
        Request request = new Request.Builder().url(check_update_url).build();
        clientFr.newCall(request).enqueue(new Callback() {
            @Override
            public void onFailure(@NonNull Call call, @NonNull IOException e) {
                e.printStackTrace();requireActivity().runOnUiThread(() -> Toast.makeText(getContext(), "Failed to fetch data. Please try again later.", Toast.LENGTH_SHORT).show());
            }

            @Override
            public void onResponse(@NonNull Call call, @NonNull Response response) throws IOException {
                if (response.isSuccessful())
                {
                    try {
                        assert response.body() != null;
                        String responseData = response.body().string();
                        JSONObject jsonObject = new JSONObject(responseData);
                        PackageInfo packageInfo = null;
                        try {
                            packageInfo = requireActivity().getPackageManager().getPackageInfo(requireActivity().getPackageName(), 0);
                        } catch (PackageManager.NameNotFoundException e) {
                            throw new RuntimeException(e);
                        }
                        String currentVersion = packageInfo.versionName;
                        String latestVersion = jsonObject.getString("latest_version");
                        Log.d("Update Check", "Latest Version: " + latestVersion);
                        Log.d("Update Check", "Current Version: " + currentVersion);
                        if (!latestVersion.equals(currentVersion))
                        {
                            String apkUrl = jsonObject.getString("apk_url");
                            updateNotify(apkUrl);
                            SharedPreferences.Editor editor = sharedPreferences.edit();
                            editor.putBoolean(KEY_UPDATE_SHOWN, true);
                            editor.apply();
                        }
                    }catch (JSONException e) {
                        e.printStackTrace(); requireActivity().runOnUiThread(() ->Toast.makeText(getContext(), "Error parsing data. Please try again later.", Toast.LENGTH_SHORT).show());
                        //Log.e("Attendance Reports", "Error parsing JSON data.");
                    }
                } else { requireActivity().runOnUiThread(()->Toast.makeText(getContext(), "Failed to fetch data. Please try again later.", Toast.LENGTH_SHORT).show());}
            }
        });
    }
    private void updateNotify(String apkUrl) {
        new android.app.AlertDialog.Builder(requireActivity()).setTitle("Update Available")
                .setMessage("A new version of the app is available. Do you want to update?")
                .setPositiveButton("Update", (dialog, which) -> {downloadAndInstall(apkUrl);})
                .setNegativeButton("Cancel", (dialog, which) ->{forceLogout();}/* dialog.dismiss()*/)
                .setCancelable(false)
                .show();
    }
    private void downloadAndInstall(String apkUrl)
    {
        Intent intent = new Intent(Intent.ACTION_VIEW, Uri.parse(apkUrl));
        startActivity(intent);
    }
    private void forceLogout()
    {
        SharedPreferences sp = requireActivity().getSharedPreferences("credentials", Context.MODE_PRIVATE);
        String isLogged = sp.getString("uname", "SoftArena");
        if(!isLogged.equals("SoftArena"))
        {
            requireActivity().runOnUiThread(()->Toast.makeText(getContext(), "Successfully Logout.", Toast.LENGTH_SHORT).show());
            new Handler().postDelayed(new Runnable() {
                @Override
                public void run()
                {
                    SharedPreferences.Editor editor=sp.edit();
                    editor.putString("uname","SoftArena");
                    editor.apply();
                    Intent intent=new Intent(requireActivity(),Login.class);
                    startActivity(intent);
                    requireActivity().finish();
                }
            }, 1500);
        }
        else
        {
           requireActivity().runOnUiThread(()->Toast.makeText(getContext(), "Invalid option has choosed.", Toast.LENGTH_SHORT).show());
        }
    }
}