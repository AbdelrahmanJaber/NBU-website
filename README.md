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

<br/><h3>MOH Database:</h3>

**`received_files`**: Stores study and volunteer files received from NBU.

**`moh_users`**: Stores user information for MOH.

<br/><h3>IRB Database:</h3>

**`irb_users`**: Stores user information for IRB.

**`received_files`**: Stores study files received from NBU.

**`accepted_studies`**: Stores accepted studies.

**`rejected_studies`**: Stores rejected studies.
