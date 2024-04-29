# NBU-website

<h2>Introduction:</h2>
<h3>1.1 Vision:</h3>
The aim of this project is to develop a website for An-Najah Biosciences Unit (NBU), facilitating communication between NBU, IRB, MOH, and volunteers contributing to medical research studies.

<h3>1.2 Project Overview:</h3>
The website will provide an easy-to-use interface for various stakeholders, including NBU administrators, IRB members, MOH representatives, and volunteers. It will streamline the process of registering volunteers for medical studies, obtaining necessary approvals, conducting research, and generating daily reports.

<h3>1.3 Project Rationale:</h3>
This project was chosen for its real-world applicability within the university and its potential impact on healthcare in Palestine. By supporting the NBU in its efforts to produce essential medicines locally, the website aligns with the university's mission and addresses a critical need in the community.

<h3>1.4 About An-Najah Biosciences Unit (NBU):</h3>
An-Najah Biosciences Unit (NBU) is a Contract Research Organization (CRO) focused on providing specialized services in clinical research and pharmaceutical development. It adheres to international standards of good clinical practice and laboratory procedures.

<h3>1.5 Characteristic Features:</h3>
The website aims to be user-friendly, accessible, secure, and portable, catering to the diverse needs of its stakeholders. It prioritizes simplicity to accommodate users with varying levels of technological proficiency.

<br/>
<br/>

<h2>Requirements:</h2>
<h3>2.1 Functional Requirements:</h3>

* Study the efficacy of drugs on volunteers.
* Facilitate volunteer registration for medical studies.
* Organize and display ongoing studies and participants.
* Provide secure login portals for NBU, IRB, and MOH.
* Enable NBU to submit study proposals to IRB and MOH.
* Generate daily reports on volunteer cases.
* Announce new studies and solicit volunteers.
* Allow NBU to manage studies (add, modify, delete) via a graphical interface.

<h3>2.2 Non-Functional Requirements:</h3>

* Security: User authentication for all operations, access control for administrators, and confidentiality of volunteer information.
* Portability: Compatibility with various browsers and devices.
* Privacy: Protection of volunteer data.
* Performance: Fast loading times for web pages and prompt query responses.

<br/>
<br/>

<h2>Project Presentation:</h2>
<h3>Home Page:</h3>
Provides an overview of the NBU, MOH, and IRB, along with features for volunteer registration and user login.

<h3>NBU Page:</h3>
Displays sections for volunteers, ongoing studies, study applications, and requests sent to MOH and IRB.

<h3>MOH Page:</h3>
Receives study files and volunteer information from NBU, with features for sorting, searching, and managing received studies.

<h3>IRB Page:</h3>
Receives studies from NBU, accepts/rejects them, and posts approved studies for volunteer registration. Features include sorting, searching, and managing studies.

<br/>
<br/>

<h2>UML Diagram:</h2>

![image](https://github.com/AbdelrahmanJaber/NBU-website/assets/113253216/f5b33c3b-6390-4b4c-85de-6f717020f1b7)

<h2>SQL Create Tables:</h2>

<h3>NBU Database:</h3>

**`nbu_users`**: Stores user information for NBU.

**`sent_to_irb`**: Tracks studies sent to IRB for approval.

**`sent_to_moh`**: Tracks studies sent to MOH for approval.

**`study`**: Stores study details.

**`studymoh`**: Stores study and volunteer files sent to MOH.

**`tableforms`**: Stores volunteer registration form data.

**`volunteer`**: Stores volunteer information.
<br/>
<h3>MOH Database:</h3>

**`received_files`**: Stores study and volunteer files received from NBU.

**`moh_users`**: Stores user information for MOH.
<br/>
<h3>IRB Database:</h3>

**`irb_users`**: Stores user information for IRB.

**`received_files`**: Stores study files received from NBU.

**`accepted_studies`**: Stores accepted studies.

**`rejected_studies`**: Stores rejected studies.
<br/>
<br/>
<br/>
<h2>Screenshots:</h2>
<br/>

![image](https://github.com/AbdelrahmanJaber/NBU-website/assets/113253216/259693da-747f-43fc-aa6b-4bd714d72c16)
![image](https://github.com/AbdelrahmanJaber/NBU-website/assets/113253216/fb110dd2-f6f6-494f-b39f-db73a65cd1d7)
![image](https://github.com/AbdelrahmanJaber/NBU-website/assets/113253216/ef2acb99-4167-4e94-b8a3-efbdb9de0248)
![image](https://github.com/AbdelrahmanJaber/NBU-website/assets/113253216/a5b27750-6c6d-4f89-a529-af1fd0895e40)
![image](https://github.com/AbdelrahmanJaber/NBU-website/assets/113253216/2206d390-27d4-4952-94dd-b025cbb8d022)
![image](https://github.com/AbdelrahmanJaber/NBU-website/assets/113253216/eeae5905-e1a0-4bf5-9755-f5ed35986d63)
![image](https://github.com/AbdelrahmanJaber/NBU-website/assets/113253216/c6623fdd-909c-44a3-884c-4458debb2bdd)
![image](https://github.com/AbdelrahmanJaber/NBU-website/assets/113253216/4e6dcfc7-9617-424b-9a3d-c5bda1edb76d)
![image](https://github.com/AbdelrahmanJaber/NBU-website/assets/113253216/733a21d2-175b-4e03-90af-c6f9df7c2c89)
![image](https://github.com/AbdelrahmanJaber/NBU-website/assets/113253216/09eeb2fe-fd0d-467b-b9ed-9bb3258ba44c)
![image](https://github.com/AbdelrahmanJaber/NBU-website/assets/113253216/948693a6-522a-444e-adcc-0d69687bf3ca)
![image](https://github.com/AbdelrahmanJaber/NBU-website/assets/113253216/f0c5a4d3-5901-4404-afd8-14dbcfe0c22f)
![image](https://github.com/AbdelrahmanJaber/NBU-website/assets/113253216/43b37257-937f-4302-9206-cb3c35468fdb)
![image](https://github.com/AbdelrahmanJaber/NBU-website/assets/113253216/a0419874-7d83-426a-a33b-c958d4b74840)
![image](https://github.com/AbdelrahmanJaber/NBU-website/assets/113253216/88ef086e-87c1-4b02-9526-a7d26b0fdb34)
![image](https://github.com/AbdelrahmanJaber/NBU-website/assets/113253216/624918e2-2311-4141-892c-3bd0df9cf42c)

<br/>
<br/>
<br/>

<h2>Demo:</h2>
Watch the demo here: https://drive.google.com/file/d/1xpds1bd66h06Mvq8-C2lOabxdJWKkQH1/view?usp=sharing
