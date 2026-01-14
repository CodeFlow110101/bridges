<?php

namespace App\Filament\Resources\StaffConfidentialityContracts\Schemas;

use App\Models\PhoneNo;
use App\Models\User;
use Carbon\Carbon;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;
use Saade\FilamentAutograph\Forms\Components\SignaturePad;
use Filament\Schemas\Components\Text;
use Filament\Schemas\Components\UnorderedList;
use Filament\Support\Enums\TextSize;

class StaffConfidentialityContractForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship(name: 'user')
                    ->native(false)
                    ->required()
                    ->live()
                    ->columnSpanFull()
                    ->getOptionLabelFromRecordUsing(fn(User $record) => "{$record->first_name} {$record->last_name} ({$record->staff_id}) (Dept: {$record->department?->name})")
                    ->afterStateUpdated(function (?string $state, ?string $old, Set $set) {
                        $user = User::find($state);
                        $set('name', $user?->full_name);
                    }),
                TextInput::make('name')->readOnly()->columnSpanFull(),
                Section::make("Phone No")
                    ->schema([
                        Select::make('phone_no_id')
                            ->native(false)
                            ->preload()
                            ->relationship(name: 'phoneno', titleAttribute: 'phone_no', modifyQueryUsing: fn(Builder $query, Get $get) => $query->where("user_id", $get("user_id")))
                            ->label("Phone no")
                            ->searchable(),
                        Select::make('phone_no_dubai_id')
                            ->native(false)
                            ->preload()
                            ->relationship(name: 'phonenodubai', titleAttribute: 'phone_no', modifyQueryUsing: fn(Builder $query, Get $get) => $query->where("user_id", $get("user_id")))
                            ->label("Phone no (Dubai)")
                            ->searchable(),
                        Select::make('emergency_phone_no_id')
                            ->native(false)
                            ->preload()
                            ->relationship(name: 'emergencyphoneno', titleAttribute: 'phone_no', modifyQueryUsing: fn(Builder $query, Get $get) => $query->where("user_id", $get("user_id")))
                            ->label("Emergency phone no")
                            ->searchable(),
                    ])->columnSpanFull(),

                Section::make("Addresses")
                    ->schema([
                        Select::make('permanent_address_id')
                            ->native(false)
                            ->preload()
                            ->relationship(name: 'permanentaddress', titleAttribute: 'address', modifyQueryUsing: fn(Builder $query, Get $get) => $query->where("user_id", $get("user_id")))
                            ->label("Permanent Address")
                            ->searchable(),
                        Select::make('temporary_address_id')
                            ->native(false)
                            ->preload()
                            ->relationship(name: 'temporaryaddress', titleAttribute: 'address', modifyQueryUsing: fn(Builder $query, Get $get) => $query->where("user_id", $get("user_id")))
                            ->label("Permanent Address")
                            ->searchable(),
                    ])->columnSpanFull(),

                Select::make('references_id')
                    ->native(false)
                    ->preload()
                    ->relationship(name: 'references', titleAttribute: 'text', modifyQueryUsing: fn(Builder $query, Get $get) => $query->where("user_id", $get("user_id")))
                    ->label("References")
                    ->searchable(),
                DatePicker::make('effective_date')
                    ->native(false)
                    ->live()
                    ->required(),
                TextInput::make('license')->columnSpanFull()->live(onBlur: true),
                Section::make("Contract Info")
                    ->schema([
                        Text::make('CONFIDENTIALITY AND POST-TERMINATION RESTRICTIONS AGREEMENT')->size(TextSize::Large),
                        Text::make(fn(Get $get) => 'This Confidentiality and Post-Termination Restrictions Agreement (“Agreement”) is entered on ' . optional(Carbon::parse($get('effective_date')))->format('M j, Y') . ' (“Effective Date”) between:'),
                        Text::make('1) Bridges Speech Center LLC /BRIDGES SYNERGY PRO FZE ] and'),
                        Text::make(fn(Get $get) => '2) ' . $get('license') . ' ' . User::find($get('user_id'))?->fullName),
                        Text::make('“Affiliate” means, as to a specified entity or person, any other entity or person that directly, or indirectly through one or more intermediaries, controls, or is controlled by, or is under common control with, the entity or person specified. An entity or person shall be deemed to control another person or other entity if the former person, or other entity possesses, directly or indirectly, the power to direct, or cause the direction of, the management and policies of the other person or other entity whether through the ownership of voting securities or partnership interests, representation on its board of directors or similar governing body, by contract or otherwise.'),
                        Text::make('RECITALS')->size(TextSize::Large),
                        UnorderedList::make([
                            'WHEREAS, the Second Party has, or will obtain, significant knowledge of the First Party and any of its Affiliates business and intimate knowledge of its customers, processes, trade secrets and/or other confidential business information;',
                            'WHEREAS, the Second Party recognizes the need for the First Party and its Affiliates to protect its competitive advantage in relation to Confidential Information, commercial good will and other assets;',
                            'WHEREAS, the Second Party and the First Party have entered into a employment contract for the purposes of legal compliance with Federal Law No: 8 of 1980, as amended, (UAE Labour Law) (“Employment Contract”) and this Agreement shall be read in conjunction with the Employment Contract together with any other supplemental agreements entered into by the Second Party and the First Party; and',
                            'WHEREAS, Second Party and the First Party desire to enter this Agreement;',
                        ]),
                        Text::make('The Second Party acknowledges that Second Party will have access to Confidential Information (as defined below) relating to the First Party, its subsidiaries its Affiliates and promoters of the First Party (each a “Group Entity”) and the Second Party agrees that the Second Party will only use such Confidential Information as necessary to perform the Second Party’s duties and obligations under the Employment Contract.'),
                        Text::make('The Second Party agrees that the Second Party will not divulge, furnish, publish or use for the Second Party’s benefit or for the direct or indirect benefit of any other person or entity, whether for monetary gain, any Confidential Information.'),
                        Text::make('The Second Party will exercise the utmost degree of care to prevent the unauthorized dissemination, disclosure and or use of any Confidential Information and, except with the prior written consent of the First Party, will not make or allow any disclosure of the Confidential Information to any third party.'),
                        Text::make('The Second Party understands that it is the First Party’s intention to maintain the confidentiality of Confidential Information not withstanding that employees of the First Party may have free access to the information for performing their duties with the First Party, and not withstanding that employees who are not expressly bound by agreements similar to this Agreement may have access to such information.'),
                        Text::make('1.1 “Confidential Information” means any and all information, whether or not reduced to written or recorded form, that is related to any Group Entity and that is not generally known or accessible to members of the public and/or competitors of any Group Entity nor intended for general dissemination, whether furnished by any Group Entity or compiled by Second Party including, without limitation, information relating to any Group Entity’s past, present, or future research, development or business affairs such as trade secrets, inventions (whether or not patentable), product development, networks, business methodologies, facilities, billing records, policies, financial and operational information, contracts, officer, director and shareholder information, suppliers, client lists, marketing or sales prospects, projected projects, Group Entity “know how,” and all copies, reproductions, notes, analyses, compilations, studies, interpretations, summaries and other documents. “Confidential Information” does not include information that has become publicly known and made generally available through no wrongful act of Second Party or others.'),
                        Text::make('1.2 The acknowledgment of the Second Party in respect of Confidential Information in clause 1.1 is distinct from and independent of any obligations resulting from or relating to any medical ethical codes to which Second Party may be subject.'),
                        Text::make('2. POST TERMINATION RESTRICTIONS')->size(TextSize::Large),
                        Text::make("2.1 Without the written prior consent of the First Party and whether alone or with others, directly or indirectly for the Second Party’s own benefit or the benefit of any person or organisation, the Second Party shall not, during the term of his employment, or for a period of twelve (12) months after its termination, offer to employ or enter into partnership, induce or attempt to induce any individual to whom this paragraph applies to leave the employment of or to discontinue the supply of his services to the First Party or any Group Entity without the First Party's prior written consent (whether or not such action would result in a breach of contract by such individual) nor shall the Second Party encourage or counsel or procure that individual to do so. This paragraph shall apply to any individual who is an employee or who provides services to the First Party or any Group Entity and whom Second Party has managed or with whom the Second Party has or has had material and/or regular dealings in the course of his employment during the twelve (12) months prior to the termination of his/her employment and who is employed by or has provided services to the First Party (or a Group Entity) in a senior or Junior or managerial capacity or in any department, marketing, business development role, provided this restriction shall apply to all management or non-management staff."),
                        Text::make('2.2 Without the written prior consent of the First Party and whether alone or with others, directly or indirectly for his own benefit or the benefit of any person or organization, the Second Party shall not during his employment or for a period of six (6) months after its termination in the Emirates of UAE:'),
                        UnorderedList::make([
                            'solicit or entice away any client or counterparty of the First Party or any Group Entity (whether a First Party or an individual) with which or whom the Second Party has had material and/or regular dealings in the course of his duties or, where this provision would apply after his employment ends, any time during the twelve (12) months prior to its termination.',
                            'in competition with the Restricted Business, seek to procure orders from, deal or carry on business with, or transact business with, any client or counterparty of the First Party or any Group Entity (whether a First Party or an individual) with which or whom the Second Party has had material and/or regular dealings in the course of his duties or, where this provision would apply after his employment ends, any time during the twelve (12) months prior to its termination;',
                            'engage the services of, render services to or become interested in (as owner, stockholder, partner, lender or other investor, director, officer, employee, consultant or otherwise) any business activity that is in competition with the Restricted Business.',
                        ]),
                        Text::make('2.3 “Restricted Business” shall mean the business or any part of the business and which in either or both case(s):'),
                        UnorderedList::make([
                            's carried on by the First Party or any Group Entity at the date of termination of the Second Party’s employment;',
                            'was carried on by the First Party or any Group Entity at any time during the Second Party’s employment or, where the relevant provision would apply after his/her employment ends, any time during the twelve months immediately preceding the date of its termination; or',
                            'is to the Second Party’s knowledge to be carried on by the First Party or any Group Entity at any time during the twelve (12) months immediately following the date of termination of his/her employment;',
                            'and which the Second Party was materially concerned with/worked for or had management responsibility for (or had substantial confidential information regarding) in either case at any time during his employment or, where the relevant provision would apply after his employment ends, any time during the period of twelve (12) months immediately prior to the date of its termination.',
                        ]),
                        Text::make('2.4 The Second Party acknowledges that:')->size(TextSize::Large),
                        UnorderedList::make([
                            'he restrictions set out above are reasonable and necessary for the protection of the legitimate interests of the First Party and/or any Group Entity and that, having regard to those interests, these restrictions do not work unreasonably on him/her;',
                            'the restrictions shall apply in relation to all clients and counterparties in respect of whom they are expressed to apply notwithstanding that such clients and counterparties may have been introduced to the First Party or any Group Entity by the Second Party (or any person under his control) before or during his employment with the First Party or any Group Entity;',
                            'any and all of his relationships from time to time with clients of the First Party and/or any Group Entity are the property of the First Party and/or its Group Entity.',
                        ]),
                        Text::make('2.5 In the event that the Second Party breaches any of the restrictions in this clause the Parties agree that he/she shall be liable to pay the First Party a sum equivalent to his/her monthly remuneration for each month or part of a month that she/he is in breach of this clause as compensation for the damages that will be incurred by the First Party as a result of the breach. The First Party reserves the right to claim further compensation in the event that the damage incurred are greater than the compensation provided by the Second Party under this clause.')->size(TextSize::Large),

                        Text::make('SUCCESSORS AND ASSIGNS')->size(TextSize::Large),

                        Text::make('This Agreement and all rights and obligations hereunder of the Second Party are personal to the Second Party and may not be transferred or assigned by the Second Party at any time. Any attempt to the contrary shall be void. The First Party may assign its rights, together with its obligations hereunder, to any parent, Affiliate, successor or any third party. Any successor, assign, Affiliate of the First Party or third party (along with any successors or assigns thereof) is an express third-party beneficiary of this Agreement, and the terms and provisions hereof, and, as such, has the right, power, and authority to enforce any and all terms of this Agreement as if such successor, assign, or Affiliate of the First Party were a party hereto.'),
                        Text::make('THIRD-PARTY BENEFICIARY')->size(TextSize::Large),

                        Text::make('This Agreement is made solely and specifically between and for the benefit of the Second Party and the First Party, subject to the express provisions hereof relating to successors and assigns, and, subject to the express provisions hereof relating to third-party beneficiaries, no other person whatsoever will have any rights, interest, or claims hereunder or be entitled to any benefits under or on account of this Agreement as a third-party beneficiary or otherwise.'),
                        Text::make('SEVERABILITY & ENFORCEMENT')->size(TextSize::Large),

                        Text::make('It is the intention of the Parties that the restrictions contained in this Agreement be enforceable to the fullest extent permitted by applicable law. Therefore, to the extent any court of competent jurisdiction shall determine that any portion of the foregoing restrictions is excessive or otherwise invalid, such provision shall not be entirely void, but rather shall be limited or revised only to the extent necessary to make it enforceable. You acknowledge that any violation, breach or other failure on your part to comply with this Agreement could materially and irreparably injure the First Party and its business in a manner inadequately compensable in damages, and that the First Party shall be entitled to seek and obtain compensation in case of breach of this Agreement in addition to any other legal remedies which may be available.'),
                        Text::make('TERM')->size(TextSize::Large),

                        Text::make('The non-disclosure and post termination restrictions provisions of this Agreement shall survive the termination or expiry of the Employment Contract.'),

                        Text::make('In case of termination of the Employment Contract, all confidentiality obligations of the Parties, as set out herein and in the Employment Contract, which have accrued before termination shall continue to exist.'),

                        Text::make('Upon expiration or termination of the Employment Contract or upon written demand by the First Party, the Second Party shall immediately cease any and all disclosures or uses of Confidential Information and at the request of the First Party, the Second Party shall promptly (but in any event within 7 days of such request) return or destroy all written, graphic or other tangible forms of Confidential Information and all copies, abstracts, extracts, samples, notes or modules thereof and certify in writing that the Second Party has complied with the obligations set forth herein.'),

                        Text::make('The Second Party will not make any effort to circumvent the terms of this Agreement in an attempt to gain the benefits or considerations granted to it under the Agreement. The obligations of the Second Party with respect to the disclosure and confidentiality shall continue to be binding and applicable without limit in point in time except and until such information enters the public domain.'),
                        Text::make('REMEDIES FOR BREACH OF CONFIDENTIALITY')->size(TextSize::Large),

                        Text::make('The Second Party hereby further undertakes and indemnifies the First Party for any costs, claims, demands and liabilities of whatsoever nature arising directly or indirectly out of breach by the Second Party of the obligations of the Second Party contained in this Agreement.'),
                        Text::make('ENTIRE AGREEMENT')->size(TextSize::Large),

                        Text::make('This Agreement together with the Employment Contract and any supplemental employment agreements between the First Party and the Second Party constitutes the full and entire understanding and agreement of the Parties with regard to the subjects hereof and supersedes in their entirety all other prior agreements, whether oral or written.'),
                        Text::make('GOVERNING LAW AND CONSENT TO JURISDICTION')->size(TextSize::Large),

                        Text::make('This Agreement shall be governed by and construed in accordance with the laws of the UAE and the courts of Dubai and Sharjah shall have exclusive jurisdiction.'),
                        Text::make('10. GENERAL PROVISION')->size(TextSize::Large),
                        UnorderedList::make([
                            'Amendments: This Agreement is expressly limited to its terms and may be modified or amended only in writing signed by both the Parties.',
                            'Waiver: The failure to exercise any right provided in this Agreement shall not be a waiver of prior or subsequent rights.',
                            'Mutual confidentiality obligation: Each Party shall keep this Agreement and its contents confidential. Nothing in this Agreement shall grant to either Party the right to make commitments or representations of any kind for or on behalf of the other Party without the prior written consent of such other Party.',
                        ]),
                        Text::make('IN WITNESS, WHEREOF, this Agreement has been executed as of the Effective Date.')->size(TextSize::Large),
                    ])->columnSpanFull(),





                Section::make("First Party Details")
                    ->schema([
                        Select::make('first_party_user_id')
                            ->relationship(name: 'firstpartyuser')
                            ->label("User")
                            ->native(false)
                            ->required()
                            ->live()
                            ->columnSpanFull()
                            ->getOptionLabelFromRecordUsing(fn(User $record) => "{$record->first_name} {$record->last_name} ({$record->staff_id})"),
                        TextInput::make('first_party_user_position')->label("Position"),
                        SignaturePad::make('first_party_user_signature')->label('Signature')->dotSize(2.0)
                            ->lineMinWidth(0.5)
                            ->lineMaxWidth(2.5)
                            ->throttle(16)
                            ->minDistance(5)
                            ->velocityFilterWeight(0.7)
                            ->backgroundColor('rgba(255, 255, 255, 1)')
                            ->penColor('#000000')
                            ->penColorOnDark('#000000'),
                        Select::make('first_party_user_emergency_phone_no_id')
                            ->native(false)
                            ->preload()
                            ->relationship(name: 'firstpartyphoneno', titleAttribute: 'phone_no', modifyQueryUsing: fn(Builder $query, Get $get) => $query->where("user_id", $get("first_party_user_id")))
                            ->label("Emergency phone no")
                            ->searchable(),
                    ])->columnSpanFull(),
                Section::make("Second Party Details")
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('second_party_name')->label("Name"),
                        TextInput::make('second_party_passport_no')->label("Passport_no"),
                        Textarea::make('second_party_current_address')->label("Address")
                            ->columnSpanFull(),
                        DatePicker::make('second_party_date')->native(false),
                        SignaturePad::make('second_party_signature')->label('Signature')->dotSize(2.0)
                            ->lineMinWidth(0.5)
                            ->lineMaxWidth(2.5)
                            ->throttle(16)
                            ->minDistance(5)
                            ->velocityFilterWeight(0.7)
                            ->backgroundColor('rgba(255, 255, 255, 1)')
                            ->penColor('#000000')
                            ->penColorOnDark('#000000'),
                    ])
            ]);
    }
}
