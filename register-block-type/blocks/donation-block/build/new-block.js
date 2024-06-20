// Provided code block with changes indicated by the user. Generate a similar code block with these changes:

//USER INPUT

( function( blocks, element, blockEditor ) {
    var el = element.createElement;
    var RichText = blockEditor.RichText;
    var useBlockProps = blockEditor.useBlockProps;
  
    blocks.registerBlockType( 'mytheme/donation-block', {
        title: 'Donation Block',
        icon: 'heart',
        category: 'widgets',
        attributes: {
            mainText: {
                type: 'string',
                source: 'html',
                selector: 'p.main-text'
            },
            additionalText: {
                type: 'string',
                source: 'html',
                selector: 'p.additional-text'
            }
        },
        edit: function( props ) {
            var blockProps = useBlockProps();
            var { attributes, setAttributes } = props;
  
            function onChangeMainText( newContent ) {
                setAttributes( { mainText: newContent } );
            }
  
            function onChangeAdditionalText( newContent ) {
                setAttributes( { additionalText: newContent } );
            }
  
            return el('div', { className: 'className' },
                el('div', { className: 'col-lg-6' },
                    el(RichText, {
                        tagName: 'p',
                        className: 'main-text',
                        onChange: onChangeMainText,
                        value: attributes.mainText,
                        placeholder: 'Insert main membership text here...'
                    }),
                ),
                el('div', { className: 'col-lg-6' },
                    el('h3', null, el('strong', null, 'Membership Benefits')),
                    el('p', null, 'Members receive special insider access and perks. It\'s our way of thanking you for what you mean to CFI.'),
                    el('p', null, 'Your gift of at least ', el('strong', null, '$60'), ' or ', el('strong', null, '$5/month'), ' includes the following for one year:'),
                    el('ul', null,
                        el('li', null, 'Advance invitations to events'),
                        el('li', null, 'Presale tickets and special discounts'),
                        el('li', null, 'Quarterly Freethought in Action newsletter')
                    ),
                    el('p', null, 'Your gift of at least ', el('strong', null, '$120'), ' or ', el('strong', null, '$10/month'), ' includes the following for one year:'),
                    el('ul', null,
                        el('li', null, 'All of the benefits above'),
                        el('li', null,
                            'Choice of either ', el('em', null, 'Skeptical Inquirer'), ' or ', el('em', null, 'Free Inquiry'), ' Magazine',
                            el('br'),
                            el('strong', null, 'Print and Digital Subscription')
                        )
                    ),
                    el('div', { className: 'row' },
                        el('div', { className: 'col-lg-6' },
                            el('div', { className: 'alert alert-success' },
                                el('strong', null, el('em', null, 'Skeptical Inquirer')),
                                el('br'),
                                'Since 1976, the Magazine committed to science, skepticism, and investigation.'
                            )
                        ),
                        el('div', { className: 'col-lg-6' },
                            el('div', { className: 'alert alert-primary' },
                                el('strong', null, el('em', null, 'Free Inquiry')),
                                el('br'),
                                'Since 1980, the Magazine for Humanism, Atheism, and all those living without religion.'
                            )
                        )
                    )
                ),
                el('div', { className: 'showhide type="donations" more_text="View frequently asked questions about CFI membership and magazines." less_text="Read Less" hidden="yes" style="text-align: center"' },
                    el('h5', null, el('strong', null, 'What should I do if I\'m a current subscriber?')),
                    el('p', null, 'Extending our magazines to our donors is intended to be a bonus and thank you for those who support us most. Current subscribers who are also members will continue to receive only one magazine each issue. If you are already subscribed to one of our magazines we encourage you to choose the other to receive thought-provoking material from us each month.'),
                    el('h5', null, el('strong', null, 'My magazine subscription is going to expire soon, should I renew?')),
                    el('p', null, 'If you would like to make a donation of $120 or $10/month or more you can let your magazine subscription expire and you\'ll continue to receive the magazine for one year from the date of your donation or for the duration of your monthly donations.'),
                    el('p', null, 'You can also choose to continue subscribing to the magazine separately and enjoy the other membership benefits.'),
                    el('h5', null, el('strong', null, 'I would rather not receive a magazine, is that okay?')),
                    el('p', null, 'Of course! We appreciate being able to apply the full value of your donation to the work that we do. Choose the amount you\'d like to donate on this page and you have the option to decline a magazine subscription on the next.'),
                    el('h5', null, el('strong', null, 'I just want to donate, not become a member formally')),
                    el('p', null, 'We never publish the list of our members and all membership benefits (aside from the Freethought in Action newsletter and magazine) are delivered via email and your secure CFI online account. Taking advantage of your membership is completely optional.'),
                    el('p', null, 'If you have any other concerns about this, please contact us at ', el('a', { href: 'mailto:development@centerforinquiry.org  ' }, ' '), ' ')
                )
            );
        },
        save: function( props ) {
            var blockProps = useBlockProps.save();
            var { attributes } = props;
  
            return el('div', blockProps,
                el('div', { className: 'col-lg-6' },
                    el('p', { className: 'main-text' }, attributes.mainText),
                    el('ul', null,
                        el('li', null, 'Advance invitations to events'),
                        el('li', null, 'Presale tickets and special discounts'),
                        el('li', null, 'Quarterly Freethought in Action newsletter')
                    )
                ),
                el('div', { className: 'col-lg-6' },
                    el('h3', null, el('strong', null, 'Membership Benefits')),
                    el('p', null, 'Members receive special insider access and perks. It\'s our way of thanking you for what you mean to CFI.'),
                    el('p', null, 'Your gift of at least ', el('strong', null, '$60'), ' or ', el('strong', null, '$5/month'), ' includes the following for one year:'),
                    el('ul', null,
                        el('li', null, 'Advance invitations to events'),
                        el('li', null, 'Presale tickets and special discounts'),
                        el('li', null, 'Quarterly Freethought in Action newsletter')
                    ),
                    el('p', null, 'Your gift of at least ', el('strong', null, '$120'), ' or ', el('strong', null, '$10/month'), ' includes the following for one year:'),
                    el('ul', null,
                        el('li', null, 'All of the benefits above'),
                        el('li', null,
                            'Choice of either ', el('em', null, 'Skeptical Inquirer'), ' or ', el('em', null, 'Free Inquiry'), ' Magazine',
                            el('br'),
                            el('strong', null, 'Print and Digital Subscription')
                        )
                    ),
                    el('div', { className: 'row' },
                        el('div', { className: 'col-lg-6' },
                            el('div', { className: 'alert alert-success' },
                                el('strong', null, el('em', null, 'Skeptical Inquirer')),
                                el('br'),
                                'Since 1976, the Magazine committed to science, skepticism, and investigation.'
                            )
                        ),
                        el('div', { className: 'col-lg-6' },
                            el('div', { className: 'alert alert-primary' },
                                el('strong', null, el('em', null, 'Free Inquiry')),
                                el('br'),
                                'Since 1980, the Magazine for Humanism, Atheism, and all those living without religion.'
                            )
                        )
                    )
                ),

                el('div', { className: 'showhide type="donations" more_text="View frequently asked questions about CFI membership and magazines." less_text="Read Less" hidden="yes" style="text-align: center"' },
                    el('h5', null, el('strong', null, 'What should I do if I\'m a current subscriber?')),
                    el('p', null, 'Extending our magazines to our donors is intended to be a bonus and thank you for those who support us most. Current subscribers who are also members will continue to receive only one magazine each issue. If you are already subscribed to one of our magazines we encourage you to choose the other to receive thought-provoking material from us each month.'),
                    el('h5', null, el('strong', null, 'My magazine subscription is going to expire soon, should I renew?')),
                    el('p', null, 'If you would like to make a donation of $120 or $10/month or more you can let your magazine subscription expire and you\'ll continue to receive the magazine for one year from the date of your donation or for the duration of your monthly donations.'),
                    el('p', null, 'You can also choose to continue subscribing to the magazine separately and enjoy the other membership benefits.'),
                    el('h5', null, el('strong', null, 'I would rather not receive a magazine, is that okay?')),
                    el('p', null, 'Of course! We appreciate being able to apply the full value of your donation to the work that we do. Choose the amount you\'d like to donate on this page and you have the option to decline a magazine subscription on the next.'),
                    el('h5', null, el('strong', null, 'I just want to donate, not become a member formally')),
                    el('p', null, 'We never publish the list of our members and all membership benefits (aside from the Freethought in Action newsletter and magazine) are delivered via email and your secure CFI online account. Taking advantage of your membership is completely optional.'),
                    el('p', null, 'If you have any other concerns about this, please contact us at ', el('a', { href: 'mailto:development@centerforinquiry.org  ' }, ' '), ' ')
                )
            );
        }
    });
}
(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor
));

// Based on the above code, generate identical functionality with the specified changes. Add a comment summarizing the functionality and the changes made, explaining their purpose and relevance. If specific reviews are recommended, list the relevant lines.

// COPILOT GENERATED CODE BLOCK