/**
 * Block dependencies
 */
import icon from "./icon";
import "./style.scss";
import "./editor.scss";

/**
 * Internal block libraries
 */
const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { InnerBlocks, useBlockProps, InspectorControls } = wp.blockEditor;
const { CheckboxControl, PanelBody } = wp.components;

/**
 * Register block
 */
export default registerBlockType("jsforwphowto/donation", {
  title: __("Donation58x", "jsforwphowto"),
  description: __(
    "Add a donation block with form and benefits copy",
    "jsforwphowto"
  ),
  category: "common",
  icon: {
    src: icon,
  },
  keywords: [__("Donate", "jsforwphowto", "Donation")],
  attributes: {
    checkboxControl: {
      type: "boolean",
      default: true,
    },
  },
  edit: (props) => {
    const {
      attributes: { checkboxControl },
      className,
      setAttributes,
    } = props;
    const blockProps = useBlockProps();
    return (
      <>
        <InspectorControls>
          <PanelBody>
            <CheckboxControl
              label={__("Show Mag Offer", "jsforwpblocks")}
              help={__(
                "Choose whether or not to display the magazine offer or just the regular membership benefits.",
                "jsforwpblocks"
              )}
              checked={checkboxControl}
              onChange={(checkboxControl) => setAttributes({ checkboxControl })}
            />
          </PanelBody>
        </InspectorControls>
        <div
          id='donation-block'
          className={"row mt-5 magazines salsa " + className}>
          <div className='col-lg-6' {...blockProps}>
            <InnerBlocks placeholder='Use the HTML Block and Copy/Paste the Salsa Embed Code here.' />
          </div>
          <div className='col-lg-6'>
            <h3>
              <strong>Membership Benefits</strong>
            </h3>
            <p>
              Members receive special insider access and perks. It's our way of
              thanking you for what you mean to CFI.
            </p>
            <p>
              Your gift of at least <strong>$60</strong> or{" "}
              <strong>$5/month</strong> includes the following for one year:
            </p>
            <ul>
              <li>Advance invitations to events</li>
              <li>Presale tickets and special discounts</li>
              <li>Quarterly Freethought in Action newsletter</li>
            </ul>
            {checkboxControl && (
              <div className='magazine-benefit'>
                <p>
                  Your gift of at least <strong>$120</strong> or{" "}
                  <strong>$10/month</strong> includes the following for one
                  year:
                </p>
                <ul>
                  <li>All of the benefits above</li>
                  <li>
                    Choice of either <em>Skeptical Inquirer</em> or{" "}
                    <em>Free Inquiry</em> Magazine
                    <br />
                    <strong>Print and Digital Subscription</strong>
                  </li>
                </ul>
                <div className='row'>
                  <div className='col-lg-6'>
                    <div className='alert alert-success'>
                      <strong>
                        <em>Skeptical Inquirer</em>
                      </strong>
                      <br />
                      Since 1976, the Magazine committed to science, skepticism,
                      and investigation.
                    </div>
                  </div>
                  <div className='col-lg-6'>
                    <div className='alert alert-primary'>
                      <strong>
                        <em>Free Inquiry</em>
                      </strong>
                      <br />
                      Since 1980, the Magazine for Humanism, Atheism, and all
                      those living without religion.
                    </div>
                  </div>
                </div>
                <p>
                  <a>
                    <em>
                      View frequently asked questions about CFI membership and
                      magazines.
                    </em>
                  </a>
                </p>
              </div>
            )}
          </div>
        </div>
        <script src='https://centerforinquiry.org/js/everyactionmembership.js?v=1.0.0'></script>
        <div
          className='modal fade'
          id='faqModal'
          tabindex='-1'
          aria-labelledby='faqModalLabel'
          style={{ display: "none" }}
          aria-hidden='true'>
          <div className='modal-dialog' role='document'>
            <div className='modal-content'>
              <div className='modal-header'>
                <h5 className='modal-title' id='faqModalLabel'>
                  <strong>Frequently Asked Questions</strong>
                </h5>
                <button
                  type='button'
                  className='close'
                  data-dismiss='modal'
                  aria-label='Close'>
                  <span aria-hidden='true'>x</span>
                </button>
              </div>
              <div className='modal-body'>
                <h5>
                  <strong>What should I do if I'm a current subscriber?</strong>
                </h5>
                <p>
                  Extending our magazines to our donors is intended to be a
                  bonus and thank you for those who support us most. Current
                  subscribers who are also members will continue to receive only
                  one magazine each issue. If you are already subscribed to one
                  of our magazines we encourage you to choose the other to
                  receive thought-provoking material from us each month.
                </p>
                <h5>
                  <strong>
                    My magazine subscription is going to expire soon, should I
                    renew?
                  </strong>
                </h5>
                <p>
                  If you would like to make a donation of $120 or $10/month or
                  more you can let your magazine subscription expire and you'll
                  continue to receive the magazine for one year from the date of
                  your donation or for the duration of your monthly donations.
                </p>
                <p>
                  You can also choose to continue subscribing to the magazine
                  separately and enjoy the other membership benefits.
                </p>
                <h5>
                  <strong>
                    I would rather not receive a magazine, is that okay?
                  </strong>
                </h5>
                <p>
                  Of course! We appreciate being able to apply the full value of
                  your donation to the work that we do. Choose the amount you'd
                  like to donate on this page and you have the option to decline
                  a magazine subscription on the next.
                </p>
                <h5>
                  <strong>
                    I just want to donate, not become a member formally
                  </strong>
                </h5>
                <p>
                  We never publish the list of our members and all membership
                  benefits (aside from the Freethought in Action newsletter and
                  magazine) are delivered via email and your secure CFI online
                  account. Taking advantage of your membership is completely
                  optional.
                </p>
                <p>
                  If you have any other concerns about this, please contact us
                  at{" "}
                  <a href='mailto:development@centerforinquiry.org'>
                    development@centerforinquiry.org
                  </a>
                  .
                </p>
              </div>
              <div className='modal-footer'>
                <button
                  type='button'
                  className='btn btn-secondary'
                  data-dismiss='modal'>
                  Close
                </button>
              </div>
            </div>
          </div>
        </div>
      </>
    );
  },
  save: (props) => {
    const {
      attributes: { checkboxControl, className },
    } = props;
    const blockProps = useBlockProps.save();
    return (
      <>
        <div
          id='donation-block'
          class={"row mt-5 magazines salsa " + className}>
          <div class='col-lg-6' {...blockProps}>
            <InnerBlocks.Content />
          </div>
          <div class='col-lg-6'>
            <h3>
              <strong>Membership Benefits</strong>
            </h3>
            <p>
              Members receive special insider access and perks. It's our way of
              thanking you for what you mean to CFI.
            </p>
            <p>
              Your gift of at least <strong>$60</strong> or{" "}
              <strong>$5/month</strong> includes the following for one year:
            </p>
            <ul>
              <li>Advance invitations to events</li>
              <li>Presale tickets and special discounts</li>
              <li>Quarterly Freethought in Action newsletter</li>
            </ul>
            {checkboxControl && (
              <div class='magazine-benefit'>
                <p>
                  Your gift of at least <strong>$120</strong> or{" "}
                  <strong>$10/month</strong> includes the following for one
                  year:
                </p>
                <ul>
                  <li>All of the benefits above</li>
                  <li>
                    Choice of either <em>Skeptical Inquirer</em> or{" "}
                    <em>Free Inquiry</em> Magazine
                    <br />
                    <strong>Print and Digital Subscription</strong>
                  </li>
                </ul>
                <div class='row'>
                  <div class='col-lg-6'>
                    <div class='alert alert-success'>
                      <strong>
                        <em>Skeptical Inquirer</em>
                      </strong>
                      <br />
                      Since 1976, the Magazine committed to science, skepticism,
                      and investigation.
                    </div>
                  </div>
                  <div class='col-lg-6'>
                    <div class='alert alert-primary'>
                      <strong>
                        <em>Free Inquiry</em>
                      </strong>
                      <br />
                      Since 1980, the Magazine for Humanism, Atheism, and all
                      those living without religion.
                    </div>
                  </div>
                </div>
                <p>
                  <a data-toggle='modal' data-target='#faqModal'>
                    <em>
                      View frequently asked questions about CFI membership and
                      magazines.
                    </em>
                  </a>
                </p>
              </div>
            )}
          </div>
        </div>
        <script src='https://centerforinquiry.org/js/magazine.js?v=1.0.0'></script>
        <div
          className='modal fade'
          id='faqModal'
          tabindex='-1'
          aria-labelledby='faqModalLabel'
          style={{ display: "none" }}
          aria-hidden='true'>
          <div className='modal-dialog' role='document'>
            <div className='modal-content'>
              <div className='modal-header'>
                <h5 className='modal-title' id='faqModalLabel'>
                  <strong>Frequently Asked Questions</strong>
                </h5>
                <button
                  type='button'
                  className='close'
                  data-dismiss='modal'
                  aria-label='Close'>
                  <span aria-hidden='true'>x</span>
                </button>
              </div>
              <div className='modal-body'>
                <h5>
                  <strong>What should I do if I'm a current subscriber?</strong>
                </h5>
                <p>
                  Extending our magazines to our donors is intended to be a
                  bonus and thank you for those who support us most. Current
                  subscribers who are also members will continue to receive only
                  one magazine each issue. If you are already subscribed to one
                  of our magazines we encourage you to choose the other to
                  receive thought-provoking material from us each month.
                </p>
                <h5>
                  <strong>
                    My magazine subscription is going to expire soon, should I
                    renew?
                  </strong>
                </h5>
                <p>
                  If you would like to make a donation of $120 or $10/month or
                  more you can let your magazine subscription expire and you'll
                  continue to receive the magazine for one year from the date of
                  your donation or for the duration of your monthly donations.
                </p>
                <p>
                  You can also choose to continue subscribing to the magazine
                  separately and enjoy the other membership benefits.
                </p>
                <h5>
                  <strong>
                    I would rather not receive a magazine, is that okay?
                  </strong>
                </h5>
                <p>
                  Of course! We appreciate being able to apply the full value of
                  your donation to the work that we do. Choose the amount you'd
                  like to donate on this page and you have the option to decline
                  a magazine subscription on the next.
                </p>
                <h5>
                  <strong>
                    I just want to donate, not become a member formally
                  </strong>
                </h5>
                <p>
                  We never publish the list of our members and all membership
                  benefits (aside from the Freethought in Action newsletter and
                  magazine) are delivered via email and your secure CFI online
                  account. Taking advantage of your membership is completely
                  optional.
                </p>
                <p>
                  If you have any other concerns about this, please contact us
                  at{" "}
                  <a href='mailto:development@centerforinquiry.org'>
                    development@centerforinquiry.org
                  </a>
                  .
                </p>
              </div>
              <div className='modal-footer'>
                <button
                  type='button'
                  className='btn btn-secondary'
                  data-dismiss='modal'>
                  Close
                </button>
              </div>
            </div>
          </div>
        </div>
      </>
    );
  },
});
