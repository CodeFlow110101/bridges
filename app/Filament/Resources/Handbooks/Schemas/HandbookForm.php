<?php

namespace App\Filament\Resources\Handbooks\Schemas;

use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Text;
use Filament\Support\Enums\TextSize;
use Filament\Schemas\Components\UnorderedList;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Saade\FilamentAutograph\Forms\Components\SignaturePad;

class HandbookForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship(name: 'user')
                    ->native(false)
                    ->required()
                    ->getOptionLabelFromRecordUsing(fn(User $record) => "{$record->first_name} {$record->last_name} ({$record->staff_id}) (Dept: {$record->department?->name})"),
                Text::make("(Document: A)")->size(TextSize::Large),
                Section::make('Introduction')
                    ->schema([
                        Text::make('This Employee Handbook contains information about the employment policies and practices of the ABC, here after referred to as the "BRIDGES". We expect each employee to read this Employee Handbook carefully, as it is a valuable reference for understanding your job and the "BRIDGES". The policies outlined in this Employment Handbook should be regarded as management guidelines only, which in a developing business will require changes from time to time. "Bridges Speech Center retains the right to make decisions involving employment as needed in order to conduct its work in a manner that is beneficial to the employees and to "BRIDGES”. This Employee Handbook supersedes and replaces any and all prior Employment Handbooks and inconsistent verbal or written policy statements. Except for the policy of at-will employment, which can only be changed by the Director of the "ABC. In writing, the “Bridges Speech Center reserves the right to revise, delete and add to the provisions of this Employee Handbook. All such revisions, deletions, or additions must be in writing and must be signed by the Director of the "ABC. No oral statements or representations can change the provisions of this Employee Handbook.')
                    ]),
                Section::make('Statement of Philosophy')
                    ->schema([
                        Text::make('BRIDGES SPEECH CENTER LLC wishes to maintain a work environment that fosters personal and professional growth for all employees. Maintaining such an environment is the responsibility of every staff person. Because of their role, Administrators and Department coordinators has the additional responsibility to lead in a manner which fosters an environment of respect for each person.'),
                        Text::make('It is the responsibility of all staff to:')->size(TextSize::ExtraSmall),
                        UnorderedList::make(collect([
                            "Foster cooperation and communication among each other",
                            "Treat each other in a fair manner, with dignity and respect",
                            "Promote harmony and teamwork in all relationships",
                            "Strive for mutual understanding of standards for performance expectations, and communicate routinely to reinforce that understanding",
                            "Encourage and consider opinions of other employees or members, and invite their participation in decisions that affect their work and their careers",
                            "Encourage growth and development of employees by helping them achieve their personal goals at the Centre and beyond.",
                            "Seek to avoid workplace conflict, and if it occurs, respond fairly and quickly to provide the means to resolve it",
                            "Administer all policies equitably and fairly, recognizing that jobs are different, but each is important; that individual performance should be recognized and measured against predetermined standards; and that each employee has the right to fair treatment.",
                            "Recognize that employees in their personal lives may experience crisis and show compassion and understanding.",
                        ])->map(fn($text) => Text::make($text)->size(TextSize::ExtraSmall))->all())
                    ]),
                Section::make('Who We Are')
                    ->schema([
                        Text::make('Our organisation is an at-will employer. This means that regardless of any provision in this employee handbook, either you or "BRIDGES” may terminate the employment relationship at any time for any reason, with or without cause or notice. Nothing in this Employee Handbook or in any document or statement, written or oral, shall limit the right to terminate employment-at-will. No officer, employee or representative of the "BRIDGES SPEECH CENTER LLC” is authorized to enter into an agreement express or implied -with any employee for employment other than at-will.'),
                    ]),
                Section::make('Vision')
                    ->schema([
                        UnorderedList::make(collect([
                            "To provide exemplary clinical care that sets a world community standard for excellence as measured by outcomes.",
                            "To be the employer of choice, providing a highly rewarding environment for our employees thus attracting and retaining the most competent and productive work force.",
                        ])->map(fn($text) => Text::make($text))->all())
                    ]),
                Section::make('Mission')
                    ->schema([
                        UnorderedList::make(collect([
                            "Provide quality value-added service by exceeding the expectations of our clients by helping them through cost-effective and quality service.",
                            "Help in advancing our profession through our commitment to education, and be a resource to our community.",
                            "Promote a family-oriented and rewarding environment to enhance the personal and professional lives of our employees.",
                        ])->map(fn($text) => Text::make($text))->all())
                    ]),
                Section::make('Values')
                    ->schema([
                        UnorderedList::make(collect([
                            "Holding ourselves to the highest possible standards in ethical and integrity-based business practices.",
                            "Treating all our clients with respect regardless of race, color or creed.",
                            "Provide a good work-life balance for our employees.",
                            "Uncompromising commitment to excellence in all we do.",
                        ])->map(fn($text) => Text::make($text))->all())
                    ]),
                Section::make('Employment at ABC')
                    ->schema(
                        collect([
                            "Equal Employment Opportunity",
                            "The provisions of this Employee Handbook are not intended to create contractual obligations with respect to any matters it covers. Nor is this Employee Handbook intended to create a contract guaranteeing that you will be employed for any specific time period.",
                            "Our organisation is committed to equal employment opportunity. We will not discriminate against employees or applicants for employment on any legally-recognized basis.",
                        ])->map(fn($text) => Text::make($text))->all()
                    ),
                Section::make('Recruitment and Selection')
                    ->schema([
                        Text::make("Applicants are invited to submit their application, along with a current résumé, demonstrating that they meet the minimum criteria for the position being sought. At the closing date, all applications are screened, and candidates selected for interview are contacted. If the interview is positive, references will be contacted. Depending on the feedback provided, a position may be offered to the applicant.")
                    ]),
                Section::make('Introductory Period')
                    ->schema([
                        Text::make("Full-time and Part-time regular employees are on a probationary period, which is stated in their employment contract."),
                        Text::make("During this time, you will be able to determine if your new job is suitable for you and your supervisor will have an opportunity to evaluate your work performance. However, the completion of the probationary period does not guarantee employment for any period of time.")
                    ]),
                Section::make('New Employee Orientation')
                    ->schema([
                        Text::make('Upon joining our organisation, you were given this copy of our Employee Handbook. After reading this Employee Handbook, please sign the receipt page and return it to our manager. You will be asked to complete all the necessary forms. Your supervisor is responsible for the operations of your department. He or She is a good source of information about the "Bridges Speech Center and your job.')
                    ]),
                Section::make('Performance Reviews')
                    ->schema([
                        Text::make('Your performance is important to our organisation.'),
                        Text::make('Our performance review program provides the basis for better understanding between you and your immediate supervisor, with respect to your job performance, potential and development within the "ABC'),
                        Text::make('Therapists will be supervised quarterly by their direct supervisors. Supervisors will be reviewed by, the Clinical Director quarterly too. However, all staff are constantly reviewed through competency checklists (KPI’S) for the therapists and the supervisors on a 4 monthly basis.'),
                        Text::make('We will be providing rewards for the consultants, based on the parents’ testimonials.'),
                    ]),
                Section::make('Promotions')
                    ->schema([
                        Text::make('We believe that career advancement is rewarding for both the employee and the organization. We will promote qualified employees to new or vacated positions whenever possible')
                    ]),
                Section::make('Changes in Personal Data')
                    ->schema([
                        Text::make('To aid you and/or your family in matters of personal emergency, we need to maintain up-to-date information. Changes in name, address, telephone number, marital status, number of dependents or changes in account / or beneficiaries should be given to your immediate supervisor promptly.')
                    ]),
                TextInput::make("probation")->live(onBlur: true),
                Section::make('Probation')
                    ->schema([
                        Text::make(fn(Get $get) => 'The ' . $get('probation') . ' of employment are probationary. During this time both parties may assess suitability for employment with the Employer. This also provides management an opportunity to assess skill levels and address areas of potential concern.')
                    ]),
                TextInput::make("hours_of_work_1")->label("Hours of work")->live(onBlur: true),
                Section::make('Hours of work')
                    ->schema([
                        Text::make(fn(Get $get) => $get('hours_of_work_1') . ' hours are expected to work on a weekly basis.')
                    ]),
                Section::make('Payday')
                    ->schema([
                        Text::make('You will be paid by "ABC" through a client wire transfer into your bank account. We will need your account details before being able to set up any salary payments. Payment of salary is made at the end of the month for the month worked (before 5th of next month).'),
                    ]),
                Section::make('Care of Equipment')
                    ->schema([
                        Text::make('You are expected to demonstrate proper care when using the ABC’s property and equipment. No property may be removed from the premises without the proper authorisation of senior management. If you lose, break or damage any property, report it to your supervisor/Clinic Manager/Coordinator at once.'),
                    ]),
                Section::make('Clean Up')
                    ->schema([
                        Text::make('Be mindful of the toys and materials you use during the session. These should be placed back in their rightful area as much as possible by the end of the session. Your workstation should be neat and clean and properly organised.'),
                    ]),
                Section::make('Breakfast Protocol')
                    ->schema([
                        Text::make('Please ensure that you finish your breakfast before the start of your workday. Our working hours are dedicated to our professional responsibilities, and admin hours should not be utilized for eating breakfast. Beginning your day with a healthy breakfast before work will help you start with the energy and focus needed for our tasks. Please reach the center 30 minutes early to have your breakfast and start the sessions on time.'),
                    ]),

                Section::make('No Food or Beverages in Therapy and Staff Rooms')
                    ->schema([
                        Text::make('As we work in a medical field, it is crucial to maintain a clean and professional environment. Eatable items are not allowed inside the therapy rooms or staff rooms. Therapy time is exclusively for the kids, and it is important that we create a distraction-free and hygienic space for their sessions. Please refrain from ordering or consuming coffee, juice, or any other beverages inside the therapy rooms during session time.'),
                    ]),
                Section::make('Professionalism')
                    ->schema([
                        Text::make('When representing ABC, staff should dress and behave appropriately. Employees should choose to dress in a manner which presents a professional image to the public and is respectful of others. Excessive use of profanity is neither professional nor respectful to co-workers and will not be tolerated.'),
                    ]),
                Section::make('Discipline')
                    ->schema([
                        Text::make('Bridges Speech Center shall be progressive, depending on the nature of the problem. Its purpose is to identify unsatisfactory performance and/or unacceptable behaviour. The stages may be:'),
                        UnorderedList::make([
                            'Verbal Warning',
                            'Written Warning in the form of Memo',
                            'Termination',
                        ]),
                        Text::make('Some circumstances may be serious enough that all three steps are not used. Some examples of these types of situations are theft, assault, or wilful neglect of duty. In all cases, documentation should be included in the employee’s personnel file.'),
                    ]),
                TextInput::make("hours_of_work_2")->label("Hours of work")->live(onBlur: true),
                Section::make('Hours of Work')
                    ->schema([
                        Text::make(fn(Get $get) => 'The regular office hours for Bridges Speech Center are 8 am to 10 pm for 6 days a week, where your scheduled off day will be ' . $get('hours_of_work_2') . '. Employees are required to fill out a leave form and email it in advance for planned days away from the office. Unplanned absences from the office should be reported to the Clinical Director and the Center Manager as soon as reasonably possible, and the leave form should be emailed along with a sick leave certificate.'),
                    ]),
                Section::make('Attendance and Punctuality')
                    ->schema([
                        Text::make('Attendance and punctuality are important factors for your success within our organisation.'),
                        Text::make('In case of emergency leave due to illness: If you are going to be late for work or absent, notify your Clinical Director/Manager as far in advance as is feasible under the circumstances, but not later than before the start of your workday. You must speak to your Clinical Director/Manager. Voicemail messages are not accepted.'),
                        Text::make('Personal issues requiring time away from your work, such as doctor\'s appointments or other matters, should be scheduled during your non-working hours if possible.'),
                        Text::make('If you are absent for three days without notifying Bridges Speech Center Organisation, it is assumed that you have voluntarily abandoned your position with Bridges Speech Center organisation, and you will be removed from the position.'),
                    ]),

                Section::make('Overtime')
                    ->schema([
                        Text::make('There will be times when you will need to work overtime so that we may meet the needs of our children and families. Although you will be given advance notice when feasible, this is not always possible.'),
                    ]),

                Section::make('Pay Advances')
                    ->schema([
                        Text::make('Pay advances will not be granted to employees.'),
                    ]),
                Section::make('If You Must Leave Us')
                    ->schema([
                        Text::make('Your thoughtfulness is appreciated and will be noted favourably should you ever wish to reapply for employment with ABC. Employees, who are rehired following a break in service in excess of three months, other than an approved leave of absence, must serve a new initial probationary period whether or not such period was previously completed. Such employees are considered new employees from the effective date of their reemployment for all purposes, including the purposes of measuring benefits.'),
                        Text::make('Generally, we will confirm upon request our employees\' dates of employment, salary history and job title.'),
                        Text::make('Additionally, all resigning employees should complete a brief exit interview prior to leaving. All Bridges Speech Center property and resources including this Employee Handbook, must be returned upon discharge. Otherwise, Bridges Speech Center may take action to recoup any replacement costs and/or seek the return of organisation property through appropriate legal recourse.'),
                        Text::make('You should notify Bridges Speech Center of any address changes for future contact purposes.'),
                    ]),

                Section::make('Sick Leave')
                    ->schema([
                        Text::make('The employee is not entitled to any paid sick leave during the probation period. However, the employee is entitled to sick leave after completion of the probationary period.'),
                        Text::make('Employees will be entitled to 10 DAYS of sick leave per calendar year and will only be available upon regularization. Also, without doctor’s certification, it will be a non-paid sick leave.'),
                    ]),

                Section::make('Sandwich Leave Policy')
                    ->schema([
                        Text::make('The company deducts leaves of an employee for week offs if that employee applies to leave the day after and before the week offs.'),
                    ]),
                Section::make('Vacation Leave')
                    ->schema([
                        Text::make('Employees will be allowed up to annual leave with the following conditions:'),
                        UnorderedList::make([
                            'It should be filed three months before the desired days.',
                            'A Vacation Leave form should be filled properly for the filing.',
                            'All clients should be indorsed properly to another therapist before going on leave.',
                            'The Clinical Director should approve the leave.',
                            'You must give an exact date when to resume at work.',
                            'All the days should be accumulated before year end.',
                            'These days of vacation will not be paid upon terminating the contract without finishing one year of service.',
                        ]),
                    ]),
                Section::make('CME/CPD Leave')
                    ->schema([
                        Text::make('As part of our commitment to fostering professional growth and development, we are providing Continuing Professional Development (CPD) and Continuing Medical Education (CME) leave policy. Licensed candidates will be entitled to two days of CPD/CME leave annually. This initiative aims to encourage and support your efforts to enhance your skills, stay abreast of industry advancements, and contribute to your overall professional development. We strongly encourage all eligible staff members to utilize these leave days to attend workshops, seminars, and other relevant events that contribute to their professional knowledge and skills. Staying informed about the latest techniques and updates in your field is not only beneficial to your personal growth but also vital for maintaining our center\'s high standards of care.'),
                        Text::make('In line with our commitment to support our staff, the center is open to assisting those who may require financial assistance to participate in CPD/CME activities. If you find yourself in need of support, please don’t hesitate to reach out to Clinic Manager/Director to discuss available options.'),
                    ]),
                Section::make('Employment of Relatives')
                    ->schema([
                        Text::make('A supervisor may not hire or supervise an individual if that individual and the supervisor have an ongoing romantic relationship, including but not limited to marriage, or if that individual is a member of the supervisor\'s immediate family. The term "Immediate Family" refers to parents, children, sisters, brothers, nieces, nephews, or other family members residing in the same household.'),
                        Text::make('In the case of marriage of persons within the same department, an effort will be made to assign comparable job duties so as to minimise problems of supervision, safety, security, and morale.'),
                    ]),

                Section::make('Personal Telephone Calls')
                    ->schema([
                        Text::make('It is important to keep our telephone lines free for business calls. Although the occasional use of the ABC’s telephones for a personal emergency may be necessary, routine personal calls should be kept to a minimum.'),
                        Text::make('Personal cellular telephones must be turned off or set to a silent alert during working hours while on the Bridges Speech Center premises.'),
                    ]),

                Section::make('Internet Usage and Monitoring')
                    ->schema([
                        Text::make('As a growing organisation, we recognise the need to stay on the cutting edge of technology. This is one of the reasons we allow employees to have access to the Internet.'),
                        Text::make('The Internet is intended for business use only. Use of the Internet for any non-business purpose, including but not limited to personal communication or solicitation, purchasing personal goods or services, gambling, and downloading files for personal use, is strictly prohibited. (E.g. Facebook, YouTube and Tinder)'),
                        Text::make('Our organisation\'s policies against sexual and other types of harassment apply fully to internet usage. Violations of those policies are not permitted and may result in disciplinary action, up to and including discharge. Therefore, employees are also prohibited from displaying, transmitting, and/or downloading sexually explicit images, messages, ethnic slurs, racial epithets, or anything that could be construed as harassment or disparaging to others.'),
                        Text::make('The time you spend on the Internet may be tracked through activity logs for business purposes. All abnormal or inappropriate usage will be investigated thoroughly. For business purposes, management reserves the right to search and/or monitor the ABC\'s Internet usage and the files/transmissions of any employee without advance notice. Employees should expect that communications that they send and receive by the Internet will be disclosed to management. Employees should not assume that communications that they send and receive by the Internet are private or confidential.'),
                        Text::make('Employees learning of any misuse of the Internet shall notify a member of management.'),
                        Text::make('Violation of this policy may result in disciplinary action up to and including discharge.'),
                    ]),
                Section::make('Acceptable Use of Electronic Communications')
                    ->schema([
                        Text::make('This policy contains guidelines for Electronic Communications created, sent, received, used, transmitted, or stored using organisation communication systems or equipment and employee-provided systems or equipment used either in the workplace, during working time, or to accomplish work tasks. "Electronic Communications" include, among other things, messages, images, data or any other information used in e-mail, instant messages, voice mail, fax machines, computers, personal digital assistants (Blackberry, Phone, or similar devices), text messages, pagers, telephones, cellular and mobile phones including those with cameras, Intranet, Internet, back-up storage, information on a memory or flash key or card, jump or zip drive or any other type of internal or external removable storage drives. In the remainder of this policy, all of these communication devices are collectively referred to as "Systems".'),
                        Text::make('Employees may use our Systems to communicate internally with co-workers or externally with children and families, suppliers, vendors, advisors, and other business acquaintances for business purposes.'),
                        Text::make('All Electronic Communications in the organisation system are organisation records and/or property. Although an employee may have an individual password to access our Systems, the Systems and Electronic Communications belong to the ABC. The Systems and Electronic Communications are accessible to Bridges Speech Center at all times including periodic unannounced inspections. Our Systems and Electronic Communications are subject to use, access, monitoring, review, recording, and disclosure without further notice.'),
                        Text::make('Our Systems and Electronic Communications are not confidential or private. ABC\'s right to use, access, monitor, record and disclose Electronic Communications without further notice applies equally to employee-provided systems or equipment used in the workplace, during working time, or to accomplish work tasks.'),
                        Text::make('Although incidental and occasional personal use of our Systems that does not interfere or conflict with productivity or ABC\'s business or violate policy is permitted, personal communications in our Systems are treated the same as all other Electronic Communications and will be used, accessed, recorded, monitored, and disclosed by Bridges Speech Center at any time without further notice. Since all Electronic Communications and Systems can be accessed without advance notice, employees should not use our Systems for communication or information that employees would not want revealed to third parties.'),
                        Text::make('Employees may not use our Systems in a manner that violates our policies including but not limited to Non-Harassment, Sexual Harassment, Equal Employment Opportunity, Confidentiality of Organisation Matters, Care of Children and Families\' Records, Protecting Information, Solicitation and Distribution, and Internet Usage. Employees may not use our Systems in any way that may be seen as insulting, disruptive, obscene, offensive, or harmful to morale. Examples of prohibited uses include, but are not limited to, sexually-explicit drawings, messages, images, cartoons, or jokes; propositions or love letters; ethnic or racial slurs, threats, or derogatory comments; or any other message or image that may be in violation of organisation policies.'),
                    ]),
                Section::make('Prohibited Uses of Systems')
                    ->schema([
                        Text::make('In addition, employees may not use our Systems:'),
                        Text::make('• To download, save, send or access any defamatory, discriminatory or obscene material.'),
                        Text::make('• To download, save, send or access any music, audio, or video file.'),
                        Text::make('• To download anything from the Internet (including shareware or free software) without the advance written permission of the Systems supervisor.'),
                        Text::make('• To download, save, send or access any site or content the Bridges Speech Center might deem "adult entertainment".'),
                        Text::make('• To access any "blog" or otherwise post a personal opinion on the internet.'),
                        Text::make('• To solicit employees or others.'),
                        Text::make('• To attempt or gain unauthorized or unlawful access to computers, equipment, networks, or systems of Bridges Speech Center or any other person or entity.'),
                        Text::make('• In connection with any infringement of intellectual property rights, including but not limited to copyrights.'),
                        Text::make('• In connection with the violation or attempted violation of any law.'),
                        Text::make('An employee may not misrepresent, disguise, or conceal his or her identity or another\'s identity in any way while using Electronic Communications; make changes to Electronic Communications without clearly indicating such changes; or use another person\'s account, mailbox, password, etc. without prior written approval of the account owner and without identifying the actual author.'),
                        Text::make('Employees must always respect intellectual property rights such as copyrights and trademarks. Employees must not copy, use, or transfer proprietary materials of Bridges Speech Center or others without appropriate authorization.'),
                        Text::make('All systems passwords and encryption keys must be available and known to ABC. Employees may not install password or encryption programs without the written permission of your supervisor. Employees may not use the passwords and encryption keys belonging to others.'),
                        Text::make('Violations of this policy may result in disciplinary action up to and including discharge as well as possible civil liabilities or criminal prosecution. Where appropriate, Bridges Speech Center may advise legal officials or appropriate third parties of policy violations and cooperate with official investigations. Bridges Speech Center will not retaliate against anyone who reports possible policy violations or assists with investigations.'),
                        Text::make('If you have questions about the acceptable use of our Systems or the content of Electronic Communications, ask your supervisor for advance clarification.'),
                    ]),
                Section::make('Social Media')
                    ->schema([
                        Text::make('Bridges Speech Center has in place policies that govern use of its own electronic communication systems, equipment, and resources which employees must follow. Bridges Speech Center may also have an interest in your electronic communications with co-workers, children and families, vendors, suppliers, competitors, and the general public on your own time. Inappropriate communications, even made on your own time using your own resources, may be grounds for discipline up to and including immediate termination. We encourage you to use good judgment when communicating via blogs, online chat rooms, networking internet sites, social internet sites, and other electronic and non-electronic forums (collectively "social media"). The following is a general and non-exhaustive list of guidelines you should keep in mind:'),
                        Text::make('• Make it clear that views expressed in social media are yours alone. Do not purport to represent the views of the Organisation in any fashion.'),
                        Text::make('• Do not disclose confidential or proprietary information regarding Bridges Speech Center or your co-workers. Use of copyrighted or trademarked ABC’s information, trade secrets, or other sensitive information may subject you to legal action. If you doubt whether it is proper to disclose information, please discuss it with your supervisor.'),
                        Text::make('• Do not disclose information that could subject Bridges Speech Center to legal liability. If Bridges Speech Center is subjected to government investigation or financial liability based on your disclosures, Bridges Speech Center may seek to hold you personally responsible.'),
                        Text::make('• Do not use Bridges Speech Center logos, trademarks, or other symbols in social media. You may not use Bridges Speech Center name to endorse, promote, denigrate or otherwise comment on any product, opinion, cause or person.'),
                        Text::make('• Be respectful of the privacy and dignity of your co-workers. Do not use or post photos of co-workers without their express consent.'),
                        Text::make('• Harassing, obscene, defamatory, threatening, or other offensive content must be avoided. Harassing or discriminatory comments, particularly if made on the basis of gender, race, religion, age, national origin, or another protected characteristic, may be deemed inappropriate even if Bridges Speech Center name is not mentioned. If social media communications in any way may adversely affect your relationships at work or violate organisation policy, you may be subject to discipline up to and including immediate termination under various organisation policies.'),
                        Text::make('• Ensure that engaging in social media does not interfere with your work commitments.'),
                        Text::make('• Social media and similar communications have the potential to reflect on both you and ABC. We hope that you will show respect for your employees, children and families, affiliates and competitors.'),
                    ]),
                Section::make('Dress Policy')
                    ->schema([
                        Text::make('Employees are expected to maintain the highest standards of personal cleanliness and present a neat, professional, and clean appearance at all times.'),
                        Text::make('Our children and families\' satisfaction represents the most important and challenging aspect of our business. Whether or not your job responsibilities place you in direct children and families\' contact, you represent Bridges Speech Center with your appearance as well as your actions.'),
                        Text::make('The properly attired individual helps to create a favourable image for ABC, to the public and fellow employees. Scrub suits/Uniforms will be provided to all medical professionals. Please ensure that you wear the provided scrub suits along with black shoes or black Crocs. This helps maintain a professional appearance and ensures compliance with our dress code.'),
                        Text::make('If you have questions regarding appropriate work attire, please contact the Administrator for further clarification.'),
                    ]),
                Section::make('Outside Employment')
                    ->schema([
                        Text::make('We hope that you will not find it necessary to seek additional outside employment. However, if you are planning to accept an outside position, you must notify the Center Director / Clinic Manager in writing.'),
                        Text::make('Outside employment must not conflict in any way with your responsibilities within our organisation. You may not work for competitors, nor may you take an ownership position with a competitor.'),
                        Text::make('Employees may not conduct outside work or use organisation property, equipment or facilities in connection with outside work while on organisation time.'),
                    ]),
                Section::make('Reference Checks')
                    ->schema([
                        Text::make('Our organisation will not honour any oral request for references. All requests must be in writing and on company letterhead. Generally, we will only confirm our employees\' date of employment, salary and job title.'),
                        Text::make('Under no circumstances should an employee provide another individual with information regarding current or former employees of our organisation. If you receive a request for reference information, please forward it to your immediate supervisor.'),
                    ]),
                Section::make('Contact with the Media')
                    ->schema([
                        Text::make('All media inquiries regarding Bridges Speech Center and its operations must be referred to the director. Only the director is authorized to make or approve public statements on behalf of ABC. No employees, unless specifically designated by the director, are authorized to make statements on behalf of or as a representative of ABC.'),
                    ]),
                Section::make('Office Supplies')
                    ->schema([
                        Text::make('Our organisation maintains a stock of basic office supplies such as pens, paper clips, staples, note pads, etc. used on a day-to-day basis by employees. All office supplies can be located in the supply closet. You can contact the office boy/girl for the same.'),
                        Text::make('If you need additional items not regularly stocked, please speak to your supervisor to place a special order.'),
                        Text::make('All office supplies are for business use only and should not be removed from the office for non-business use. Violations of this policy may result in disciplinary action up to and including discharge.'),
                    ]),
                Section::make('Workplace Searches')
                    ->schema([
                        Text::make('To protect the property and to ensure the safety of all employees, children and families and ABC, Bridges Speech Center reserves the right to conduct personal searches consistent with state law, and to inspect any packages, parcels, purses, handbags, brief cases, lunch boxes or any other possessions or articles carried to and from ABC\'s property. In addition, Bridges Speech Center reserves the right to search any employee\'s office, desk, files, locker, equipment or any other area or article on our premises. In this regard, it should be noted that all offices, desks, files, lockers, equipment, etc. are the property of ABC, and are issued for the use of employees only during their employment. Inspection may be conducted at any time at the discretion of ABC.'),
                        Text::make('Persons entering the premises who refuse to cooperate in an inspection conducted pursuant to this policy may not be permitted to enter the premises. Employees working on or entering or leaving the premises who refuse to cooperate in an inspection, as well as employees who after the inspection are believed to be in possession of stolen property or illegal substances, will be subject to disciplinary action, up to and including discharge, if upon investigation they are found to be in violation of Bridges Speech Center security procedures or any other rules and regulations.'),
                    ]),
                Section::make('Workplace Violence')
                    ->schema([
                        Text::make('Violence by an employee or anyone else against an employee, supervisor or member of management will not be tolerated. The purpose of this policy is to minimize the potential risk of personal injuries to employees at work and to reduce the possibility of damage to organisation property in the event of someone, for whatever reason, may be unhappy with the organisation decision or action by an employee or member of management.'),
                        Text::make('If you receive or overhear any threatening communications from an employee or outside third party, report it to your immediate supervisor at once. Do not engage in either physical or verbal confrontation with a potentially violent individual. If you encounter an individual who is threatening immediate harm to an employee or visitor to our premises, contact an emergency (such as 999) immediately.'),
                        Text::make('All reports of work-related threats will be kept confidential to the extent possible, investigated and documented. Employees are expected to report and participate in an investigation of any suspected or actual cases of workplace violence and will not be subjected to disciplinary consequences for such reports or cooperation. Violations of this policy, including your failure to report or fully cooperate in ABC’s investigation, may result in disciplinary action, up to and including discharge.'),
                    ]),
                Section::make('Good Housekeeping')
                    ->schema([
                        Text::make('Good work habits and a neat place to work are essential for job safety and efficiency. You are expected to keep your place of work always organized and materials in good order. Report anything that needs repair or replacement to your supervisor.'),
                    ]),
                Section::make('Smoking in the Workplace & Non-Harassment')
                    ->schema([
                        Text::make('Our organisation is committed to providing a safe and healthy environment for employees and visitors. Smoking is not permitted. Employees are requested not to smoke with our clients. Violations of this policy may result in disciplinary action, up to and including discharge.'),
                        Text::make('We prohibit harassment of one employee by another employee, supervisor or third party for any reason. Harassment of third parties by our employees is also prohibited.'),
                    ]),
                Section::make('Good Housekeeping & Communication')
                    ->schema([
                        Text::make('Good work habits and a neat place to work are essential for job safety and efficiency. You are expected to keep your place of work always organized and materials in good order. Report anything that needs repair or replacement to your supervisor.'),
                        Text::make('Communication is truly the best way to relay important information to co-workers, business partners, clients and parents. In the centre we strive our best to make good communication for the benefit of all through:'),
                    ]),
                Section::make('Internal Communication')
                    ->schema([
                        Text::make('Staff Meeting'),
                        Text::make('Parent Meetings'),
                        Text::make('Progress Meetings'),
                        Text::make('Supervisions'),
                    ]),
                Section::make('Staff Meetings')
                    ->schema([
                        Text::make('Staff meetings should be held at least once a week to discuss policies and procedures, concerns, feedback, and future plans in the Centre. Everyone is required to attend these meetings as Bridges Speech Center believes that having one goal is the best way to run the Centre.'),
                    ]),
                Section::make('Parent Meetings')
                    ->schema([
                        Text::make('Parent meetings usually happen when there is a service change or any concern that parents need to relay to the therapist. These meetings are typically conducted by the Clinical Director or HODs, together with the therapists if needed.'),
                    ]),
                Section::make('Progress Meetings')
                    ->schema([
                        Text::make('Progress meetings usually happen every 3 months, where the parents, therapists, and HODs come together to discuss the progress of the client’s therapy.'),
                    ]),
                Section::make('Supervisions')
                    ->schema([
                        Text::make('Supervisions is a type of communication pertaining to your performance from the supervisor, clinic manager, and managing director. In this meeting, they will address everything regarding your performance, and you can also share anything that could help you improve your performance.'),
                    ]),
                Section::make('External Communication')
                    ->schema([
                        Text::make('Talking to clients and business partners is encouraged for all staff. However, messaging business partners and clients regarding services or complaints is unethical and will not be tolerated. If a parent or business partner has any concerns regarding our services or complaints, it should be relayed to the supervisors or clinic manager so they can communicate it to higher management. Alternatively, you can advise the other party to email the manager/admin, and the message will be attended to within 3 working days.'),
                    ]),
                Section::make('NON-COMPETE')
                    ->schema([
                        Text::make('The Employee shall not, without the prior written consent of the Company, during the term of this Contract and for 12 months following termination of this Contract as per Article 10 of the Federal Labour Law UAE, in any manner, directly or indirectly, individually or with others, within Dubai, carry on, be engaged in, or be concerned with any business similar to that of the Company. Any violation of this clause while employed by the Company shall be cause for termination without notice or payment in lieu of notice.'),
                    ]),
                Section::make('NON-SOLICITATION')
                    ->schema([
                        Text::make('The Employee agrees that he/she shall not, at any time during the term of employment or within one year following the termination of employment, either directly or indirectly, individually or with others, within the UAE, solicit any of the Company\'s customers or persons whom the Company was soliciting as customers at the time of termination. Solicitation while employed by the Company shall be cause for termination without notice or payment in lieu of notice.'),
                        Text::make('The Employee agrees that he/she shall not, during the term of employment or within one year following termination, either directly or indirectly, individually or with others, within the UAE, entice or try to entice away any employee of the Company. Any violation of this clause while employed by the Company shall be cause for termination without notice or payment in lieu of notice.'),
                    ]),
                Section::make('CONFIDENTIALITY / NON-DISCLOSURE')
                    ->schema([
                        Text::make('The Employee acknowledges that in the performance of his/her duties he/she will acquire detailed and confidential knowledge of the Company\'s operations and other confidential documents and information.'),
                        Text::make('The Employee agrees that he/she shall not in any way use, divulge, furnish, or make accessible to any person, either during his/her employment or any time thereafter, any confidential information relating to the business of the Company, acquired by the Employee during his/her employment with the Company, unless such disclosure is compelled by a competent court or by applicable law.'),
                    ]),
                Section::make('Receipt of Employee Handbook and Employment-At-Will Statement')
                    ->schema([
                        Text::make('This is to acknowledge that I have received a copy of Bridges Speech Center Employee Handbook and I understand that it contains information about the employment policies and practices of ABC. I agree to read and comply with this Employee Handbook. I understand that the policies outlined in this Employee Handbook are management guidelines only, which in a developing business will require changes from time to time. I understand that Bridges Speech Center retains the right to make decisions involving employment as needed in order to conduct its work in a manner that is beneficial to the employees and ABC. I understand that this Employee Handbook supersedes and replaces any and all prior Employee Handbooks and any inconsistent verbal or written policy statements.'),
                        Text::make('I understand that except for the policy of at-will employment, which can only be changed by the Director of Bridges Speech Center in a signed written contract, the organisation reserves the right to revise, delete and add to the provisions of this Employee Handbook at any time without further notice. All such revisions, deletions or additions to the Employee Handbook will be in writing and will be signed by the Director of ABC. I understand that no oral statements or representations can change the provisions of this Employee Handbook.'),
                        Text::make('I understand that this Employee Handbook is not intended to create contractual obligations with respect to any matters it covers and that the Employee Handbook does not create a contract guaranteeing that I will be employed for any specific time period.'),
                        Text::make('I understand that this Employee Handbook refers to current benefit plans maintained by Bridges Speech Center and that I must refer to the actual plan documents and summary plan descriptions as these documents are controlling.'),
                        Text::make('If I have questions regarding the content or interpretation of this Employee Handbook, I will ask my immediate supervisor or a member of the management.'),
                        Text::make('I also understand that if a written contract is inconsistent with the Employee Handbook, my employment contract is controlling.'),
                    ]),

                Section::make('First Party')->schema([
                    Select::make('first_party_user_id')
                        ->relationship(name: 'firstPartyUser')
                        ->native(false)
                        ->required()
                        ->getOptionLabelFromRecordUsing(fn(User $record) => "{$record->first_name} {$record->last_name} ({$record->staff_id}) (Dept: {$record->department?->name})")
                        ->live(),
                    SignaturePad::make('first_party_signature')->label('Signature')->dotSize(2.0)
                        ->lineMinWidth(0.5)
                        ->lineMaxWidth(2.5)
                        ->throttle(16)
                        ->minDistance(5)
                        ->velocityFilterWeight(0.7)
                        ->backgroundColor('rgba(255, 255, 255, 1)')
                        ->penColor('#000000')
                        ->penColorOnDark('#000000'),
                ])->columns(2),
                Section::make('Second Party')->schema([
                    TextInput::make('second_party_name')->label('Name'),
                    TextInput::make('second_party_passport_number')->label('Passport'),
                    Textarea::make('second_party_current_address')->label('Address'),
                    DatePicker::make('second_party_date')->native(false)->label('Date'),
                    SignaturePad::make('second_party_signature')->label('Signature')->dotSize(2.0)
                        ->lineMinWidth(0.5)
                        ->lineMaxWidth(2.5)
                        ->throttle(16)
                        ->minDistance(5)
                        ->velocityFilterWeight(0.7)
                        ->backgroundColor('rgba(255, 255, 255, 1)')
                        ->penColor('#000000')
                        ->penColorOnDark('#000000'),
                ])->columns(2)
            ])->columns(1);
    }
}
