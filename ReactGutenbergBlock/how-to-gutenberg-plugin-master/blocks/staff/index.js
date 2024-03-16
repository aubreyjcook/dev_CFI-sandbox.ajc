/**
 * Block dependencies
 */
import icon from "./icon";
import icons from "./icons";
import "./style.scss";
import "./editor.scss";

/**
 * Internal block libraries
 */
const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { RichText, MediaUpload } = wp.blockEditor;
const { Button } = wp.components;

/**
 * Register block
 */
export default registerBlockType("jsforwphowto/staff", {
  title: __("Staff", "jsforwphowto"),
  description: __("Staff directory listing.", "jsforwphowto"),
  category: "common",
  icon: {
    src: icon,
  },
  keywords: [__("Employee", "jsforwphowto")],
  attributes: {
    imgURL: {
      type: "string",
      source: "attribute",
      attribute: "src",
      selector: ".staff-image img",
    },
    imgID: {
      type: "number",
    },
    imgAlt: {
      type: "string",
      source: "attribute",
      attribute: "alt",
      selector: ".staff-image img",
    },
    staffName: {
      type: "array",
      source: "children",
      selector: ".staff-info h4",
    },
    staffTitle: {
      type: "array",
      source: "children",
      selector: ".staff-info h5",
    },
    contactInfo: {
      type: "array",
      source: "children",
      selector: ".staff-info .contact-info",
    },
    anchor: {
      type: "string",
    },
  },
  supports: {
    anchor: true,
  },
  edit: (props) => {
    const {
      attributes: {
        imgID,
        imgURL,
        imgAlt,
        staffName,
        staffTitle,
        contactInfo,
        anchor,
      },
      className,
      setAttributes,
      isSelected,
    } = props;
    const onSelectImage = (img) => {
      setAttributes({
        imgID: img.id,
        imgURL: img.url,
        imgAlt: img.alt,
      });
    };
    const onRemoveImage = () => {
      setAttributes({
        imgID: null,
        imgURL: null,
        imgAlt: null,
      });
    };
    const onChangeName = (staffName) => {
      setAttributes({ staffName });
    };
    const onChangeTitle = (staffTitle) => {
      setAttributes({ staffTitle });
    };
    const onChangeInfo = (contactInfo) => {
      setAttributes({ contactInfo });
    };
    return (
      <>
        <div id={anchor} className={"staff-block clearfix " + className}>
          {!imgID ? (
            <MediaUpload
              onSelect={onSelectImage}
              type="image"
              value={imgID}
              render={({ open }) => (
                <Button className={"button button-large"} onClick={open}>
                  {icons.upload}
                  {__(" Upload Image (optional)", "jsforwphowto")}
                </Button>
              )}
            ></MediaUpload>
          ) : (
            <>
              <div class="wp-block-cover staff-image border-0">
                <img
                  loading="lazy"
                  className="wp-block-cover__image-background"
                  alt={imgAlt}
                  src={imgURL}
                  data-object-fit="cover"
                />
              </div>
              {isSelected ? (
                <Button className="remove-image" onClick={onRemoveImage}>
                  {icons.remove}
                </Button>
              ) : null}
            </>
          )}
          <div className="staff-info">
            <RichText
              tagName="h4"
              style={{ color: "#084d93" }}
              placeholder={__("Staff Name", "jsforwphowto")}
              onChange={onChangeName}
              value={staffName}
            />
            <RichText
              tagName="h5"
              placeholder={__("Staff Title", "jsforwphowto")}
              onChange={onChangeTitle}
              value={staffTitle}
              style={{ fontStyle: "italic" }}
            />
            <RichText
              tagName="div"
              multiline="p"
              className="contact-info"
              placeholder={__(
                "Email and/or phone, remember to link email",
                "jsforwphowto"
              )}
              onChange={onChangeInfo}
              value={contactInfo}
            />
          </div>
        </div>
        <hr />
      </>
    );
  },
  save: (props) => {
    const {
      attributes: {
        className,
        staffName,
        imgURL,
        imgAlt,
        staffTitle,
        contactInfo,
        anchor,
      },
    } = props;
    return (
      <>
        <div id={anchor} className={"staff-block clearfix " + className}>
          {imgURL && (
            <div className="wp-block-cover staff-image border-0">
              <img
                loading="lazy"
                className="wp-block-cover__image-background"
                alt={imgAlt}
                src={imgURL}
                data-object-fit="cover"
              />
            </div>
          )}
          <div className="staff-info">
            <h4>{staffName}</h4>
            <h5>{staffTitle}</h5>
            <div class="contact-info">{contactInfo}</div>
          </div>
        </div>
        <hr />
      </>
    );
  },
});
